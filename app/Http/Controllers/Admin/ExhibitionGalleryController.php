<?php

namespace App\Http\Controllers\Admin;

use App\ExhibationCategory;
use App\ExhibitionGallery;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExhibitionGalleryRequest;
use App\Http\Requests\StoreExhibitionGalleryRequest;
use App\Http\Requests\UpdateExhibitionGalleryRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExhibitionGalleryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('exhibition_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitionGalleries = ExhibitionGallery::all();

        return view('admin.exhibitionGalleries.index', compact('exhibitionGalleries'));
    }

    public function create()
    {
        abort_if(Gate::denies('exhibition_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibition_categories = ExhibationCategory::where('type','egallery')->get()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exhibitionGalleries.create', compact('exhibition_categories'));
    }

    public function store(StoreExhibitionGalleryRequest $request)
    {
        $exhibitionGallery = ExhibitionGallery::create($request->all());

        foreach ($request->input('gallery', []) as $file) {
            $exhibitionGallery->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibitionGallery->id]);
        }

        return redirect()->route('admin.exhibition-galleries.index');
    }

    public function edit(ExhibitionGallery $exhibitionGallery)
    {
        abort_if(Gate::denies('exhibition_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibition_categories = ExhibationCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exhibitionGallery->load('exhibition_category');

        return view('admin.exhibitionGalleries.edit', compact('exhibition_categories', 'exhibitionGallery'));
    }

    public function update(UpdateExhibitionGalleryRequest $request, ExhibitionGallery $exhibitionGallery)
    {
        $exhibitionGallery->update($request->all());

        if (count($exhibitionGallery->gallery) > 0) {
            foreach ($exhibitionGallery->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $exhibitionGallery->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $exhibitionGallery->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.exhibition-galleries.index');
    }

    public function show(ExhibitionGallery $exhibitionGallery)
    {
        abort_if(Gate::denies('exhibition_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitionGallery->load('exhibition_category');

        return view('admin.exhibitionGalleries.show', compact('exhibitionGallery'));
    }

    public function destroy(ExhibitionGallery $exhibitionGallery)
    {
        abort_if(Gate::denies('exhibition_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitionGallery->delete();

        return back();
    }

    public function massDestroy(MassDestroyExhibitionGalleryRequest $request)
    {
        ExhibitionGallery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('exhibition_gallery_create') && Gate::denies('exhibition_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ExhibitionGallery();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}