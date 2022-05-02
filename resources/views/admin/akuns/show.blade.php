@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.akun.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akuns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.kd_akun') }}
                        </th>
                        <td>
                            {{ $akun->kd_akun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.nama_akun') }}
                        </th>
                        <td>
                            {{ $akun->nama_akun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Akun::STATUS_SELECT[$akun->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.pendekatan') }}
                        </th>
                        <td>
                            {{ App\Models\Akun::PENDEKATAN_SELECT[$akun->pendekatan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.jenis') }}
                        </th>
                        <td>
                            {{ $akun->jenis }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akuns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection