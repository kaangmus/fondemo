<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;

class ShopController extends Controller
{
     public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->take(20)->get();
        
        return view('shop',compact('sliders'));
    }
}
