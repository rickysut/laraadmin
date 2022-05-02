<?php

namespace App\Http\Requests;

use App\Models\Akun;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAkunRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_edit');
    }

    public function rules()
    {
        return [
            'kd_akun' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:akuns,kd_akun,' . request()->route('akun')->id,
            ],
            'nama_akun' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
            'pendekatan' => [
                'required',
            ],
            'jenis' => [
                'string',
                'required',
            ],
        ];
    }
}
