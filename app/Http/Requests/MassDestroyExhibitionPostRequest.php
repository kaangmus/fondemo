<?php

namespace App\Http\Requests;

use App\ExhibitionPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExhibitionPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('exhibition_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:exhibition_posts,id',
        ];
    }
}