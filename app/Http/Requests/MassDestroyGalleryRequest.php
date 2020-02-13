<?php

namespace App\Http\Requests;

use App\Gallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGalleryRequest extends FormRequest
{
    public function authorize()
    {
      

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:galleries,id',
        ];
    }
}
