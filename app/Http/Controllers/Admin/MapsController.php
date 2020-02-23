<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMapRequest;
use App\Http\Requests\StoreMapRequest;
use App\Http\Requests\UpdateMapRequest;
use App\Map;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MapsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        

        $maps = map::all();

        return view('admin.maps.index', compact('maps'));
    }

    public function create()
    {
       

        $categories = Category::all()->pluck('name', 'id');
        

        return view('admin.maps.create', compact('categories'));
    }

    public function store(StoreMapRequest $request)
    {
        $map = map::create($request->all());
        $map->categories()->sync($request->input('categories', []));

     

        foreach ($request->input('photos', []) as $file) {
            $map->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        return redirect()->route('admin.maps.index');
    }

    public function edit(Map $map)
    {
        

        $categories = Category::all()->pluck('name', 'id');
        

        $map->load('categories');

        return view('admin.maps.edit', compact('categories', 'map'));
    }

    public function update(UpdateMapRequest $request, map $map)
    {
        if(!$request->active){
            $request->merge([
                'active' => 0
            ]);
        }
        $map->update($request->all());
        $map->categories()->sync($request->input('categories', []));

      

        if (count($map->photos) > 0) {
            foreach ($map->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $map->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $map->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.maps.index');
    }

    public function show(Map $map)
    {
       

        
        $map->load('categories', 'created_by');

        return view('admin.maps.show', compact('map',));
    }

    public function destroy(map $map)
    {
        

        $map->delete();

        return back();
    }

    public function massDestroy(MassDestroyMapRequest $request)
    {
        Map::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
