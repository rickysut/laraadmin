<?php

namespace App\Http\Requests;

use App\Models\Coa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCoaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coa_edit');
    }

    public function rules()
    {
        return [
            'coa_code' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'coa_name' => [
                'string',
                'required',
            ],
        ];
    }
}