<?php

namespace App\Http\Controllers\Admin;

use App\Advisor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAdvisorRequest;
use App\Http\Requests\StoreAdvisorRequest;
use App\Http\Requests\UpdateAdvisorRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvisorController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
 

        $advisors = Advisor::all();

        return view('admin.advisors.index', compact('advisors'));
    }

    public function create()
    {
        

        return view('admin.advisors.create');
    }

    public function store(StoreAdvisorRequest $request)
    {
        $advisor = Advisor::create($request->all());

        if ($request->input('photp', false)) {
            $advisor->addMedia(storage_path('tmp/uploads/' . $request->input('photp')))->toMediaCollection('photp');
        }

        return redirect()->route('admin.advisors.index');
    }

    public function edit(Advisor $advisor)
    {
       

        return view('admin.advisors.edit', compact('advisor'));
    }

    public function update(UpdateAdvisorRequest $request, Advisor $advisor)
    {
        $advisor->update($request->all());

        if ($request->input('photp', false)) {
            if (!$advisor->photp || $request->input('photp') !== $advisor->photp->file_name) {
                $advisor->addMedia(storage_path('tmp/uploads/' . $request->input('photp')))->toMediaCollection('photp');
            }
        } elseif ($advisor->photp) {
            $advisor->photp->delete();
        }

        return redirect()->route('admin.advisors.index');
    }

    public function show(Advisor $advisor)
    {
        

        return view('admin.advisors.show', compact('advisor'));
    }

    public function destroy(Advisor $advisor)
    {
        

        $advisor->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvisorRequest $request)
    {
        Advisor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
     


}
