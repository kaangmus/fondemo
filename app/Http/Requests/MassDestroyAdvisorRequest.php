<?php

namespace App\Http\Requests;

use App\Advisor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAdvisorRequest extends FormRequest
{
    public function authorize()
    {
      

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:advisors,id',
        ];
    }
}
