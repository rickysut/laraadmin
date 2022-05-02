<?php

namespace App\Http\Requests;

use App\Models\Satker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySatkerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('satker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:satkers,id',
        ];
    }
}
