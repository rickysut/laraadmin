<?php

namespace App\Http\Requests;

use App\Models\Desa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDesaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('desa_create');
    }

    public function rules()
    {
        return [
            'kd_kec_id' => [
                'required',
                'integer',
            ],
            'kd_desa' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:desas,kd_desa',
            ],
            'nm_desa' => [
                'string',
                'required',
            ],
            'kd_bast' => [
                'string',
                'nullable',
            ],
            'lat' => [
                'numeric',
            ],
            'lng' => [
                'numeric',
            ],
        ];
    }
}
