<?php

namespace App\Http\Requests;

use App\Ngo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreNgoRequest extends FormRequest
{
    public function authorize()
    {
        

        return true;
    }

    public function rules()
    {
        return [
            'species.*' => [
                'integer',
            ],
            'species'   => [
                'array',
            ],
        ];
    }
}
