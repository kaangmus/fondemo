<?php

namespace App\Http\Controllers\Admin;

use App\ExhibationCategory;
use App\ExhibitionPost;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExhibitionPostRequest;
use App\Http\Requests\StoreExhibitionPostRequest;
use App\Http\Requests\UpdateExhibitionPostRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExhibitionPostController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibition_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitionPosts = ExhibitionPost::all();

        return view('admin.exhibitionPosts.index', compact('exhibitionPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('exhibition_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibition_categories = ExhibationCategory::where('type','epost')->get()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exhibitionPosts.create', compact('exhibition_categories'));
    }

    public function store(StoreExhibitionPostRequest $request)
    {
        $exhibitionPost = ExhibitionPost::create($request->all());

        if ($request->input('feature_image', false)) {
            $exhibitionPost->addMedia(storage_path('tmp/uploads/' . $request->input('feature_image')))->toMediaCollection('feature_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibitionPost->id]);
        }

        return redirect()->route('admin.exhibition-posts.index');
    }

    public function edit(ExhibitionPost $exhibitionPost)
    {
        abort_if(Gate::denies('exhibition_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibition_categories = ExhibationCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exhibitionPost->load('exhibition_category');

        return view('admin.exhibitionPosts.edit', compact('exhibition_categories', 'exhibitionPost'));
    }

    public function update(UpdateExhibitionPostRequest $request, ExhibitionPost $exhibitionPost)
    {
        $exhibitionPost->update($request->all());

        if ($request->input('feature_image', false)) {
            if (!$exhibitionPost->feature_image || $request->input('feature_image') !== $exhibitionPost->feature_image->file_name) {
                $exhibitionPost->addMedia(storage_path('tmp/uploads/' . $request->input('feature_image')))->toMediaCollection('feature_image');
            }
        } elseif ($exhibitionPost->feature_image) {
            $exhibitionPost->feature_image->delete();
        }

        return redirect()->route('admin.exhibition-posts.index');
    }

    public function show(ExhibitionPost $exhibitionPost)
    {
        abort_if(Gate::denies('exhibition_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitionPost->load('exhibition_category');

        return view('admin.exhibitionPosts.show', compact('exhibitionPost'));
    }

    public function destroy(ExhibitionPost $exhibitionPost)
    {
        abort_if(Gate::denies('exhibition_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitionPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyExhibitionPostRequest $request)
    {
        ExhibitionPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('exhibition_post_create') && Gate::denies('exhibition_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ExhibitionPost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}