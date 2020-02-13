<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySliderRequest;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Slider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class SliderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        

        $sliders = Slider::all();
      
        
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        

        return view('admin.sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::create($request->all());

        if ($request->input('image', false)) {
            $slider->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return redirect()->route('admin.sliders.index');
    }

    public function edit(Slider $slider)
    {
       

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $slider->update($request->all());

        if ($request->input('image', false)) {
            if (!$slider->image || $request->input('image') !== $slider->image->file_name) {
                $slider->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($slider->image) {
            $slider->image->delete();
        }

        return redirect()->route('admin.sliders.index');
    }

    public function show(Slider $slider)
    {
        

        return view('admin.sliders.show', compact('slider'));
    }

    public function destroy(Slider $slider)
    {
        

        $slider->delete();

        return back();
    }

    public function massDestroy(MassDestroySliderRequest $request)
    {
        Slider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}
