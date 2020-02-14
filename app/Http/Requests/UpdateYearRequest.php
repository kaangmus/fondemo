<?php

namespace App\Http\Requests;

use App\Year;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateYearRequest extends FormRequest
{
    public function authorize()
    {
        

        return true;
    }

    public function rules()
    {
        return [
            'ngos.*' => [
                'integer',
            ],
            'ngos'   => [
                'array',
            ],
        ];
    }
}
