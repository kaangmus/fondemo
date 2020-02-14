<?php

namespace App\Http\Controllers\Admin;

use App\DigitalBrochure;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDigitalBrochureRequest;
use App\Http\Requests\StoreDigitalBrochureRequest;
use App\Http\Requests\UpdateDigitalBrochureRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DigitalBrochuresController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        

        $digitalBrochures = DigitalBrochure::all();

        return view('admin.digitalBrochures.index', compact('digitalBrochures'));
    }

    public function create()
    {
        

        return view('admin.digitalBrochures.create');
    }

    public function store(StoreDigitalBrochureRequest $request)
    {
        $digitalBrochure = DigitalBrochure::create($request->all());
        
        if ($request->input('pdf', false)) {
            $digitalBrochure->addMedia(storage_path('tmp/uploads/' . $request->input('pdf')))->toMediaCollection('pdf');
        }
        if ($request->input('digitalphoto', false)) {
            $digitalBrochure->addMedia(storage_path('tmp/uploads/' . $request->input('digitalphoto')))->toMediaCollection('digitalphoto');
        }

        return redirect()->route('admin.digital-brochures.index');
    }

    public function edit(DigitalBrochure $digitalBrochure)
    {
        

        return view('admin.digitalBrochures.edit', compact('digitalBrochure'));
    }

    public function update(UpdateDigitalBrochureRequest $request, DigitalBrochure $digitalBrochure)
    {
        $digitalBrochure->update($request->all());

        if ($request->input('pdf', false)) {
            if (!$digitalBrochure->pdf || $request->input('pdf') !== $digitalBrochure->pdf->file_name) {
                $digitalBrochure->addMedia(storage_path('tmp/uploads/' . $request->input('pdf')))->toMediaCollection('pdf');
            }
        } elseif ($digitalBrochure->pdf) {
            $digitalBrochure->pdf->delete();
        }
        
        if ($request->input('digitalphoto', false)) {
            if (!$digitalBrochure->digitalphoto || $request->input('digitalphoto') !== $digitalBrochure->digitalphoto->file_name) {
                $digitalBrochure->addMedia(storage_path('tmp/uploads/' . $request->input('digitalphoto')))->toMediaCollection('digitalphoto');
            }
        } elseif ($digitalBrochure->digitalphoto) {
            $digitalBrochure->digitalphoto->delete();
        }

        return redirect()->route('admin.digital-brochures.index');
    }

    public function show(DigitalBrochure $digitalBrochure)
    {
        

        return view('admin.digitalBrochures.show', compact('digitalBrochure'));
    }

    public function destroy(DigitalBrochure $digitalBrochure)
    {
        

        $digitalBrochure->delete();

        return back();
    }

    public function massDestroy(MassDestroyDigitalBrochureRequest $request)
    {
        DigitalBrochure::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

     public function get_digital_pdf($id)
    {
        

        $digitalBrochure= DigitalBrochure::find($id);

        return view('admin.digitalBrochures.digitalpdf', compact('digitalBrochure'));
    }
}
