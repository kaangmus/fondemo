<?php

namespace App\Http\Requests;

use App\ExhibationCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateExhibationCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('exhibation_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'year_id' => [
                'required',
                'integer'],
            'type'    => [
                'required'],
        ];
    }
}