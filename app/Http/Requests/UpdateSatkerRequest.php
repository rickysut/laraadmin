<?php

namespace App\Http\Requests;

use App\Models\Satker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSatkerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('satker_edit');
    }

    public function rules()
    {
        return [
            'kd_satker' => [
                'string',
                'required',
                'unique:satkers,kd_satker,' . request()->route('satker')->id,
            ],
            'nm_satker' => [
                'string',
                'required',
            ],
            'kd_kwn' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kwn' => [
                'string',
                'nullable',
            ],
            'tingkat' => [
                'string',
                'nullable',
            ],
        ];
    }
}
