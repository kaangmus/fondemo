<?php

namespace App\Http\Requests;
use App\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        // abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}