<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyYearRequest;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;
use App\Ngo;
use App\Year;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class YearController extends Controller
{
    public function index()
    {
        

        $years = Year::all();

        return view('admin.years.index', compact('years'));
    }

    public function create()
    {
       

        $ngos = Ngo::all()->pluck('name', 'id');

        return view('admin.years.create', compact('ngos'));
    }

    public function store(StoreYearRequest $request)
    {
        $year = Year::create($request->all());
    //    $year->yearngos()->sync($request->input('ngos', []));

        return redirect()->route('admin.years.index');
    }

    public function edit(Year $year)
    {
       

        $ngos = Ngo::all()->pluck('name', 'id');

        $year->load('yearngos');

        return view('admin.years.edit', compact('ngos', 'year'));
    }

    public function update(UpdateYearRequest $request, Year $year)
    {
        $year->update($request->all());
    //    $year->yearngos()->sync($request->input('ngos', []));

        return redirect()->route('admin.years.index');
    }

    public function show(Year $year)
    {
        

        $year->load('yearngos');

        return view('admin.years.show', compact('year'));
    }

    public function destroy(Year $year)
    {        

        $year->delete();

        return back();
    }

    public function massDestroy(MassDestroyYearRequest $request)
    {
        Year::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
