<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySpeciesRequest;
use App\Http\Requests\StoreSpeciesRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use App\Species;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpeciesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        

        $species = Species::all();

        return view('admin.species.index', compact('species'));
    }

    public function create()
    {
      

        return view('admin.species.create');
    }

    public function store(StoreSpeciesRequest $request)
    {
        $species = Species::create($request->all());

        if ($request->input('image', false)) {
            $species->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return redirect()->route('admin.species.index');
    }

    public function edit(Species $species)
    {
        

        return view('admin.species.edit', compact('species'));
    }

    public function update(UpdateSpeciesRequest $request, Species $species)
    {
        $species->update($request->all());

        if ($request->input('image', false)) {
            if (!$species->image || $request->input('image') !== $species->image->file_name) {
                $species->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($species->image) {
            $species->image->delete();
        }

        return redirect()->route('admin.species.index');
    }

    public function show(Species $species)
    {
        

        return view('admin.species.show', compact('species'));
    }

    public function destroy(Species $species)
    {
        

        $species->delete();

        return back();
    }

    public function massDestroy(MassDestroySpeciesRequest $request)
    {
        Species::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
