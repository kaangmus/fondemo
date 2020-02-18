<?php

namespace App\Http\Controllers\Admin;

use App\ExhibationCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExhibationCategoryRequest;
use App\Http\Requests\StoreExhibationCategoryRequest;
use App\Http\Requests\UpdateExhibationCategoryRequest;
use App\Year;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExhibationCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibation_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibationCategories = ExhibationCategory::all();

        return view('admin.exhibationCategories.index', compact('exhibationCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('exhibation_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $years = Year::all()->pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exhibationCategories.create', compact('years'));
    }

    public function store(StoreExhibationCategoryRequest $request)
    {
        $exhibationCategory = ExhibationCategory::create($request->all());

        if ($request->input('e_cat_video', false)) {
            $exhibationCategory->addMedia(storage_path('tmp/uploads/' . $request->input('e_cat_video')))->toMediaCollection('e_cat_video');
        }

        if ($request->input('e_cat_post_video', false)) {
            $exhibationCategory->addMedia(storage_path('tmp/uploads/' . $request->input('e_cat_post_video')))->toMediaCollection('e_cat_post_video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibationCategory->id]);
        }

        return redirect()->route('admin.exhibation-categories.index');
    }

    public function edit(ExhibationCategory $exhibationCategory)
    {
        abort_if(Gate::denies('exhibation_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $years = Year::all()->pluck('year', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exhibationCategory->load('year');

        return view('admin.exhibationCategories.edit', compact('years', 'exhibationCategory'));
    }

    public function update(UpdateExhibationCategoryRequest $request, ExhibationCategory $exhibationCategory)
    {
        $exhibationCategory->update($request->all());

        if ($request->input('e_cat_video', false)) {
            if (!$exhibationCategory->e_cat_video || $request->input('e_cat_video') !== $exhibationCategory->e_cat_video->file_name) {
                $exhibationCategory->addMedia(storage_path('tmp/uploads/' . $request->input('e_cat_video')))->toMediaCollection('e_cat_video');
            }
        } elseif ($exhibationCategory->e_cat_video) {
            $exhibationCategory->e_cat_video->delete();
        }

        if ($request->input('e_cat_post_video', false)) {
            if (!$exhibationCategory->e_cat_post_video || $request->input('e_cat_post_video') !== $exhibationCategory->e_cat_post_video->file_name) {
                $exhibationCategory->addMedia(storage_path('tmp/uploads/' . $request->input('e_cat_post_video')))->toMediaCollection('e_cat_post_video');
            }
        } elseif ($exhibationCategory->e_cat_post_video) {
            $exhibationCategory->e_cat_post_video->delete();
        }

        return redirect()->route('admin.exhibation-categories.index');
    }

    public function show(ExhibationCategory $exhibationCategory)
    {
        abort_if(Gate::denies('exhibation_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibationCategory->load('year', 'exhibitionCategoryExhibitionPosts', 'exhibitionCategoryExhibitionGalleries');

        return view('admin.exhibationCategories.show', compact('exhibationCategory'));
    }

    public function destroy(ExhibationCategory $exhibationCategory)
    {
        abort_if(Gate::denies('exhibation_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibationCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyExhibationCategoryRequest $request)
    {
        ExhibationCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('exhibation_category_create') && Gate::denies('exhibation_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ExhibationCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}