<?php

namespace App\Http\Requests;

use App\Models\Belanja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBelanjaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('belanja_create');
    }

    public function rules()
    {
        return [
            'tahun' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kewenangan' => [
                'string',
                'required',
            ],
            'pagu' => [
                'required',
            ],
            'realisasi' => [
                'required',
            ],
        ];
    }
}
