<?php

namespace App\Http\Requests;

use App\DigitalBrochure;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDigitalBrochureRequest extends FormRequest
{
    public function authorize()
    {
       

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
