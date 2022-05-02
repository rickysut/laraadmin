@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.backdateBanpem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.backdate-banpems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.backdateBanpem.fields.year') }}
                        </th>
                        <td>
                            {{ $backdateBanpem->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backdateBanpem.fields.kd_akun') }}
                        </th>
                        <td>
                            {{ $backdateBanpem->kd_akun->kd_akun ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backdateBanpem.fields.nom_pagu') }}
                        </th>
                        <td>
                            {{ $backdateBanpem->nom_pagu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backdateBanpem.fields.nom_realisasi') }}
                        </th>
                        <td>
                            {{ $backdateBanpem->nom_realisasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.backdate-banpems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection