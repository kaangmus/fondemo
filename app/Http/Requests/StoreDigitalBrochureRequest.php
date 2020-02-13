<?php

namespace App\Http\Requests;

use App\DigitalBrochure;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDigitalBrochureRequest extends FormRequest
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
