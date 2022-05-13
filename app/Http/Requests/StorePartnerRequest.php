<?php

namespace App\Http\Requests;

use App\Models\Partner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_create');
    }

    public function rules()
    {
        return [
            'partner_type' => [
                'required',
            ],
            'partner_code' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'partner_name' => [
                'string',
                'required',
            ],
            'partner_phone' => [
                'string',
                'nullable',
            ],
            'partner_pic' => [
                'string',
                'nullable',
            ],
        ];
    }
}