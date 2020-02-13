<?php

namespace App\Http\Controllers;
use App\Slider;
use App\ContentCategory;
use App\ContentPage;
use App\ContentTag;
use App\Advisor;
use App\NgoPrice;
use App\DigitalBrochure;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('published_at', 'desc')->take(20)->get();
        $advisors=Advisor::where('status','advisor')->orderBy('published_at', 'desc')->get();
        $whoweares=Advisor::where('status','whoweare')->orderBy('published_at', 'desc')->get();
        
        
        $mediums=Contentpage::where('type','medium')->orderBy('published_at','desc')->take(2)->get();
        $larges=Contentpage::where('type','large')->orderBy('published_at','desc')->take(1)->get();
        foreach ($larges as $key => $large) {
            $larges=$large;
        }
        $faposts = Contentpage::where('type','small')->whereHas('categories', function($q){$q->whereIn('name', ['Focused Articles']);})->orderBy('published_at', 'asc')->take(6)->get();
        
        $fundposts = Contentpage::where('type','small')->whereHas('categories', function($q){$q->whereIn('name', ['Emergency funds']);})->orderBy('published_at', 'desc')->take(2)->get();
       
        $ngoprices=NgoPrice::all();
         $ngopricestotal=0;
        foreach ($ngoprices as $key => $ngoprice) {
            $ngopricestotal+=$ngoprice->price;
        }

     
        
        

   
         

       
        $digitalbrochures=DigitalBrochure::orderBy('published_at', 'desc')->take(7)->get();
        $app_url = config('app.url');
       

     

        

    
       
        
        
        return view('welcome', compact('sliders','advisors','whoweares',
        'ngopricestotal','digitalbrochures','app_url','fundposts','faposts','larges','mediums'));
    }
    
}
