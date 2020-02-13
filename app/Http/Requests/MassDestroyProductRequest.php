<?php

namespace App\Http\Requests;

use App\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductRequest extends FormRequest
{
    public function authorize()
    {
        

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:products,id',
        ];
    }
}
