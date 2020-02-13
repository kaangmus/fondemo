<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNgocompanyRequest;
use App\Http\Requests\UpdateNgocompanyRequest;
use App\Http\Resources\Admin\NgocompanyResource;
use App\Ngocompany;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NgocompanyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ngocompany_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NgocompanyResource(Ngocompany::with(['animal'])->get());
    }

    public function store(StoreNgocompanyRequest $request)
    {
        $ngocompany = Ngocompany::create($request->all());

        return (new NgocompanyResource($ngocompany))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ngocompany $ngocompany)
    {
        abort_if(Gate::denies('ngocompany_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NgocompanyResource($ngocompany->load(['animal']));
    }

    public function update(UpdateNgocompanyRequest $request, Ngocompany $ngocompany)
    {
        $ngocompany->update($request->all());

        return (new NgocompanyResource($ngocompany))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ngocompany $ngocompany)
    {
        abort_if(Gate::denies('ngocompany_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ngocompany->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
