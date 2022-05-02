@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.satker.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.satkers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.satker.fields.kd_satker') }}
                        </th>
                        <td>
                            {{ $satker->kd_satker }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satker.fields.nm_satker') }}
                        </th>
                        <td>
                            {{ $satker->nm_satker }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satker.fields.kd_kwn') }}
                        </th>
                        <td>
                            {{ $satker->kd_kwn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satker.fields.kwn') }}
                        </th>
                        <td>
                            {{ $satker->kwn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satker.fields.tingkat') }}
                        </th>
                        <td>
                            {{ $satker->tingkat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satker.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Satker::STATUS_SELECT[$satker->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.satkers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection