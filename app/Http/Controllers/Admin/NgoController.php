<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNgoRequest;
use App\Http\Requests\StoreNgoRequest;
use App\Http\Requests\UpdateNgoRequest;
use App\Ngo;
use App\Species;
use App\Year;
use App\NgoPrice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Collection;

class NgoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        
        $ngos = Ngo::all();

        return view('admin.ngos.index', compact('ngos'));
    }

    public function create()
    {
        
        $NgoPrice=NgoPrice::where(['ngo_id'=>0])->get();
        $years=collect(Year::all());
        $defaultYears=collect(Year::all());
        $ngoprices = collect($NgoPrice)->mapToGroups(function($ngoprice,$key){
            $ngoprice->year_id = $ngoprice->year->year;
            return [$ngoprice->specie_id=>['index'=>$ngoprice->year->id,'specie'=>$ngoprice->specie->name,'year'=>$ngoprice->year_id,'price'=>$ngoprice->price]];
        });
        //Default
        $default = $defaultYears->map(function($year){
            return ['index'=>$year->id,'specie'=>'0','year'=>$year->year,'price'=>'000.00'];
        });     
        $species = Species::all()->pluck('name', 'id');
        return view('admin.ngos.create', compact('species','years','ngoprices','default'));

    }



    public function store(StoreNgoRequest $request)
    {
        $ngo = Ngo::create($request->all());       
        foreach ($request->species as $key => $val) {
             $years = $request->input("years_$val",[]);
             $prices = $request->input("prices_$val",[]);
             $yearsAry=collect(Year::all())->pluck('id','year');
            //  return $yearsAry['2012'];
              foreach($years as $key=>$year){
                $ngoPrice = NgoPrice::create([
                    'ngo_id'=>$ngo->id,
                    'year_id'=>$yearsAry["$year"],
                    'price'=>$prices[$key],
                    'specie_id'=>$val,
                ]);
                // return $saveAry;
                $ngo->Years()->attach( $yearsAry["$year"] );
              }
                //  $ngo->Years()->attach( $years[$key],['price'=>$price] );
            }
            
         $ngo->species()->sync($request->input('species', []));
        

        if ($request->input('photo', false)) {
            $ngo->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.ngos.index');
    }

    public function edit($id)
    {

        $ngo=Ngo::find($id);//(['ngo_id'=>$id])->get();
        $NgoPrice=NgoPrice::where(['ngo_id'=>$id])->get();
        $years=collect(Year::all());
        $defaultYears=collect(Year::all());
        $ngoprices = collect($NgoPrice)->mapToGroups(function($ngoprice,$key){
            $ngoprice->year_id = $ngoprice->year->year;
            return [$ngoprice->specie_id=>['index'=>$ngoprice->year->id,'specie'=>$ngoprice->specie->name,'year'=>$ngoprice->year_id,'price'=>$ngoprice->price]];
        });
        //Default
        $default = $defaultYears->map(function($year){
            return ['index'=>$year->id,'specie'=>'0','year'=>$year->year,'price'=>'000.00'];
        });  
        // return [$ngoprices,$default];   
        // $ngoprices = collect($ngoprices[11])->merge($default)->unique('year');   
        // return $default;   
        $species = Species::all()->pluck('name', 'id');
        $ngo->load('species','years');

        return view('admin.ngos.edit', compact('ngo','species','years','ngoprices','default'));     
         
        //  return view('admin.ngos.edit', compact('ngo','default','species','years','NgoPrice','yearsAry'));
        //  return view('admin.ngos.edit', compact('species','ngoyear','years','ngo'));
    }
   



    
    public function update(UpdateNgoRequest $request, Ngo $ngo)
    {
        
        $ngo->update($request->all());
        // return $ngo->prices;
        foreach ($request->species as $key => $val) {
            //Request key
             $years = $request->input("years_$val",[]);
             $prices = $request->input("prices_$val",[]);

             $years = collect($years)->map(function($year){
                $yearsAry=collect(Year::all())->pluck('id','year');
                return $yearsAry[$year];
             });
             
              foreach($years as $key=>$year){
                $ngo->years()->detach();
                $ngo->Years()->attach( $year );
                $ngoPrice = NgoPrice::updateOrCreate(
                    [
                     'ngo_id'=>$ngo->id,
                     'year_id'=>$year,
                     'specie_id'=>$val
                    ],
                    ['price'=>$prices[$key]]
                );
                // if(isset( $prices[$key])){

                //     $ngoPrice->price = $prices[$key];
                //     $ngoPrice->save();
                // }
                // return $ngoPrice;
                // return $saveAry;
              }
                //  $ngo->Years()->attach( $years[$key],['price'=>$price] );
            }

        $ngo->species()->sync($request->input('species', []));

        if ($request->input('photo', false)) {
            if (!$ngo->photo || $request->input('photo') !== $ngo->photo->file_name) {
                $ngo->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($ngo->photo) {
            $ngo->photo->delete();
        }

        return redirect()->route('admin.ngos.index');
    }

    public function show(Ngo $ngo)
    {
        

        $ngo->load('species');

        return view('admin.ngos.show', compact('ngo'));
    }

    public function destroy(Ngo $ngo)
    {        

        $ngo->delete();

        return back();
    }
     public function remove(Ngo $ngo)
    {
        dd('test');

         $ngo->years()->deatch();

        return back();
    }

    public function massDestroy(MassDestroyNgoRequest $request)
    {
        Ngo::whereIn('id', request('ids'))->each(function ($ngo) {

        $ngo->years()->deatch();
        $ngo->delete();

    });

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
