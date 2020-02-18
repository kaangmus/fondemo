<?php

namespace App\Http\Requests;

use App\ExhibationCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExhibationCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('exhibation_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:exhibation_categories,id',
        ];
    }
}