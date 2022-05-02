<?php

namespace App\Http\Requests;

use App\Models\Provinsi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProvinsiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('provinsi_create');
    }

    public function rules()
    {
        return [
            'kd_prop' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:provinsis,kd_prop',
            ],
            'nm_prop' => [
                'string',
                'required',
            ],
            'lat' => [
                'numeric',
            ],
            'lng' => [
                'numeric',
            ],
            'no_satker' => [
                'string',
                'nullable',                
            ],
            'kd_bast' => [
                'string',
                'nullable',
            ],
        ];
    }
}
