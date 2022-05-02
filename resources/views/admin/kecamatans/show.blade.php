@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kecamatan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kecamatans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kecamatan.fields.kd_kab') }}
                        </th>
                        <td>
                            {{ $kecamatan->kd_kab->kd_kab.' - '.$kecamatan->kd_kab->nama_kab ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kecamatan.fields.kd_kec') }}
                        </th>
                        <td>
                            {{ $kecamatan->kd_kec }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kecamatan.fields.nm_kec') }}
                        </th>
                        <td>
                            {{ $kecamatan->nm_kec }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kecamatan.fields.kd_bast') }}
                        </th>
                        <td>
                            {{ $kecamatan->kd_bast }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kecamatan.fields.lat') }}
                        </th>
                        <td>
                            {{ $kecamatan->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kecamatan.fields.lng') }}
                        </th>
                        <td>
                            {{ $kecamatan->lng }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kecamatans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection