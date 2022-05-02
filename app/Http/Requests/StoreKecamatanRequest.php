<?php

namespace App\Http\Requests;

use App\Models\Kecamatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKecamatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kecamatan_create');
    }

    public function rules()
    {
        return [
            'kd_kab_id' => [
                'required',
                'integer',
            ],
            'kd_kec' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:kecamatans,kd_kec',
            ],
            'nm_kec' => [
                'string',
                'required',
            ],
            'lat' => [
                'numeric',
            ],
            'lng' => [
                'numeric',
            ],
            'kd_bast' => [
                'string',
                'nullable',
            ],
        ];
    }
}
