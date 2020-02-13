<?php

namespace App\Http\Requests;

use App\ProductTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductTagRequest extends FormRequest
{
    public function authorize()
    {
        

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
