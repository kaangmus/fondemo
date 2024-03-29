<?php

namespace App\Http\Requests;

use App\DigitalBrochure;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDigitalBrochureRequest extends FormRequest
{
    public function authorize()
    {
      

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:digital_brochures,id',
        ];
    }
}
