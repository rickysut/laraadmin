<?php

namespace App\Http\Requests;

use App\Models\BackdateBanpem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBackdateBanpemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('backdate_banpem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:backdate_banpems,id',
        ];
    }
}
