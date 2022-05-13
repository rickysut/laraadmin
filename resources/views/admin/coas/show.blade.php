@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.coa.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.coas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.coa.fields.id') }}
                        </th>
                        <td>
                            {{ $coa->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coa.fields.coa_code') }}
                        </th>
                        <td>
                            {{ $coa->coa_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coa.fields.coa_name') }}
                        </th>
                        <td>
                            {{ $coa->coa_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.coa.fields.coa_parent') }}
                        </th>
                        <td>
                            {{ $coa->coa_parent->coa_code ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.coas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection