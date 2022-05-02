@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.belanja.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.belanjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.tahun') }}
                        </th>
                        <td>
                            {{ $belanja->tahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.kewenangan') }}
                        </th>
                        <td>
                            {{ $belanja->kewenangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.pagu') }}
                        </th>
                        <td>
                            {{ $belanja->pagu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.belanja.fields.realisasi') }}
                        </th>
                        <td>
                            {{ $belanja->realisasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.belanjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection