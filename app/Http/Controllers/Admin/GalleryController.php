<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGalleryRequest;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        

        $galleries = Gallery::all();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        

        return view('admin.galleries.create');
    }

    public function store(StoreGalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        foreach ($request->input('gallery', []) as $file) {
            $gallery->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        return redirect()->route('admin.galleries.index');
    }

    public function edit(Gallery $gallery)
    {
       

        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $gallery->update($request->all());

        if (count($gallery->gallery) > 0) {
            foreach ($gallery->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $gallery->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $gallery->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.galleries.index');
    }

    public function show(Gallery $gallery)
    {
       

        return view('admin.galleries.show', compact('gallery'));
    }

    public function destroy(Gallery $gallery)
    {
      

        $gallery->delete();

        return back();
    }

    public function massDestroy(MassDestroyGalleryRequest $request)
    {
        Gallery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function gallery()
    {
         $galleries = Gallery::all();
       foreach ($galleries as $key => $value) {
          
         if($key==0){
            $photogallery= $value->gallery;
         }
       }
    

        return view('gallery', compact('photogallery'));
    }
}
