<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Animal;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Http\Resources\Admin\AnimalResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnimalsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('animal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnimalResource(Animal::all());
    }

    public function store(StoreAnimalRequest $request)
    {
        $animal = Animal::create($request->all());

        if ($request->input('image', false)) {
            $animal->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new AnimalResource($animal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Animal $animal)
    {
        abort_if(Gate::denies('animal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnimalResource($animal);
    }

    public function update(UpdateAnimalRequest $request, Animal $animal)
    {
        $animal->update($request->all());

        if ($request->input('image', false)) {
            if (!$animal->image || $request->input('image') !== $animal->image->file_name) {
                $animal->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($animal->image) {
            $animal->image->delete();
        }

        return (new AnimalResource($animal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Animal $animal)
    {
        abort_if(Gate::denies('animal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $animal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
