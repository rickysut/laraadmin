<?php

namespace App\Http\Requests;

use App\Models\BackdateBanpem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBackdateBanpemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('backdate_banpem_create');
    }

    public function rules()
    {
        return [
            'year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kd_akun_id' => [
                'required',
                'integer',
            ],
            'nom_pagu' => [
                'required',
            ],
            'nom_realisasi' => [
                'required',
            ],
        ];
    }
}
