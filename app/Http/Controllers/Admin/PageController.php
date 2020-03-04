<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPageRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Page;
use App\ContentPage;
use App\ContentTag;
use App\Gallery;
use App\ContentCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        // abort_if(Gate::denies('page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request)
    {
        // dd($request->all());
        $page = Page::create($request->all());
        if ($request->input('feature_image', false)) {
            $page->addMedia(storage_path('tmp/uploads/' . $request->input('feature_image')))->toMediaCollection('feature_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $page->id]);
        }

        return redirect()->route('admin.pages.index');
    }

    public function edit(Page $page)
    {
        // abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->all());

        if ($request->input('feature_image', false)) {
            if (!$page->feature_image || $request->input('feature_image') !== $page->feature_image->file_name) {
                $page->addMedia(storage_path('tmp/uploads/' . $request->input('feature_image')))->toMediaCollection('feature_image');
            }
        } elseif ($page->feature_image) {
            $page->feature_image->delete();
        }

        return redirect()->route('admin.pages.index');
    }

    public function show(Page $page)
    {
        // abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.show', compact('page'));
    }

    public function destroy(Page $page)
    {
        // abort_if(Gate::denies('page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page->delete();

        return back();
    }

    public function massDestroy(MassDestroyPageRequest $request)
    {
        Page::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        // abort_if(Gate::denies('page_create') && Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Page();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

     public function page(page $page )
    {
       $relates = ContentPage::with(['categories'])->OrderBy('published_at', 'asc')->get();
        $gallerys = Gallery::all();

        return view('page', compact('page','relates','gallerys'));
    }


}