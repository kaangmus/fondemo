<?php

namespace App\Http\Controllers;
use App\Ngo;
use App\Year;
use App\Species;
use App\NgoPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $allyears = Year::OrderBy('id', 'desc')->get();
      $ngos = Ngo::OrderBy('name', 'asc')->get();
     $allspecies=Species::OrderBy('published_at', 'asc')->get();
     $allspedd='0';
     $speciesbyyear=[];
    

  

        $data = [];
        $years = Year::OrderBy('id', 'desc')->get();
        $years = collect($years);
       
        $species = collect(Species::OrderBy('published_at', 'asc')->get());
        $species = $species->mapToGroups(function($specie){
            $total = collect($specie->prices)->sum('price');
            $ngos = collect($specie->speciesNgos);
            $specie->ngos = $ngos;
            $specie->price = $specie->prices->mapToGroups(function($price){
                $price->name = $price->ngo->name;
                return [$price->name=>$price];
            });
            $specie->total = $total;
            // return [$specie->type=>$specie,'ngos'=>$ngos,'total_in'=>$total];
            return [$specie->type=>$specie];
        });
        // return $species->toArray();
        $yearsData = $years->map(function($year,$key){
                $prices = collect($year->prices);
                // //yearly total price
                $total = $prices->sum('price');
                $prices =$prices->map(function($price,$key){
                    //Price Ngo 
                    // collect($price->ngo);
                    //Price Specie
                    // $species = collect($price->ngo->species)->mapToGroups(function($specie){
                    //     $ngos = collect($specie->speciesNogs);
                    //     $prices = collect($specie->speciesNogs);
                    //     return [$specie->type=>$specie];
                    // });
                    $price->specie_name = $price->specie->name;
                    $price->specie_type = $price->specie->type;
                    $price->name = $price->ngo->name;
                    return $price;
                });
                // $prices = $prices->unique();
                // $year->prices = $prices->unique();
                $year->total_in = $total;
                $ngos = collect($year->yearngos)->unique('id');
                $species =$ngos->map(function($ngo,$key){
                    //Price Ngo 
                    collect($ngo->prices);
                    //Price Specie
                    $species = collect($ngo->species)->mapToGroups(function($specie){
                        $specie->total = collect($specie->prices)->sum('price');
                        $specie->price = $specie->prices->mapToGroups(function($price){
                        $price->name = $price->ngo->name;
                        return [$price->name=>$price];
                         });
                        return [$specie->type=>$specie];
                    });

                     return $species;
                });
                $year->species = $species;

                
                $prices = $prices->mapToGroups(function($price){
                    return [$price->specie_type=>$price];
                });
                // $species = collect($species)->mapToGroups(function($specie){
                   
                //     return [$specie->type=>$specie];
                // });
                // $species = $prices->unique('ngo_id');
                // $year->species = $prices->unique('ngo_id');;
                // $year->prices = $prices->unique('ngo_id');;
            // return [$year->year=>$year];
            return [$year->year=>$year,'year'=>$year,'ngos'=>$ngos,'species'=>$species,'prices'=>$prices,'total_in'=>$total];
        });


 

        // Total By all Year
        $total = $yearsData->sum('total_in');
        // return $total;
        $data = ['yearsData'=>$yearsData,'total'=>$total];
        $years = Year::OrderBy('id', 'desc')->get();
        $ngos = Ngo::OrderBy('name', 'asc')->get();
        
        $yearsData = $yearsData;
        // return $yearsData;
        $speciesbyyear='';
        
        return view('grands',compact('yearsData','years','total','ngos','species','allspecies','speciesbyyear','allspedd'));

        
      
     
       
       
    }

    public function testAry(){

        $data = [];
        $years = Year::OrderBy('id', 'desc')->get();
        $years = collect($years);
        $yearsData = $years->map(function($year,$key){
            $prices = collect($year->prices);

                //yearly total price
                $total = $prices->sum('price');

                $NgoSpecie =$prices->map(function($price,$key){
                    //Price Ngo 
                    $price->ngos = collect($price->ngo);

                    //Price Specie
                    $price->specie = collect($price->specie);
                return $price;
                });

            return ['NgoSpecie'=>$NgoSpecie,'total_in'=>$total];
        });
        

        // Total By all Year
        $allTotal = $yearsData->sum('total_in');
        
        $data = ['years'=>$yearsData,'total'=>$allTotal];
        return $data;
        $subtotal = 0;
        $total=$allTotal ;
        return view('testing',compact('data','years','subtotal','total','speciesbyyear'));

    }
   
}
