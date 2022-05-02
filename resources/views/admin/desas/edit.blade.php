@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.desa.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.desas.update", [$desa->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kd_kec_id">{{ trans('cruds.desa.fields.kd_kec') }}</label>
                <select class="form-control select2 {{ $errors->has('kd_kec') ? 'is-invalid' : '' }}" name="kd_kec_id" id="kd_kec_id" required>
                    @foreach($kd_kecs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kd_kec_id') ? old('kd_kec_id') : $desa->kd_kec_id ?? '') == $id ? 'selected' : '' }}>{{ $id }} - {{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kd_kec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_kec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.kd_kec_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kd_desa">{{ trans('cruds.desa.fields.kd_desa') }}</label>
                <input class="form-control {{ $errors->has('kd_desa') ? 'is-invalid' : '' }}" type="number" name="kd_desa" id="kd_desa" value="{{ old('kd_desa', $desa->kd_desa) }}" step="1" required>
                @if($errors->has('kd_desa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_desa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.kd_desa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nm_desa">{{ trans('cruds.desa.fields.nm_desa') }}</label>
                <input class="form-control {{ $errors->has('nm_desa') ? 'is-invalid' : '' }}" type="text" name="nm_desa" id="nm_desa" value="{{ old('nm_desa', $desa->nm_desa) }}" required>
                @if($errors->has('nm_desa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_desa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.nm_desa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kd_bast">{{ trans('cruds.desa.fields.kd_bast') }}</label>
                <input class="form-control {{ $errors->has('kd_bast') ? 'is-invalid' : '' }}" type="text" name="kd_bast" id="kd_bast" value="{{ old('kd_bast', $desa->kd_bast) }}" >
                @if($errors->has('kd_bast'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_bast') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.kd_bast_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.desa.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number" name="lat" id="lat" value="{{ old('lat', $desa->lat) }}" step="0.0000000001">
                @if($errors->has('lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lng">{{ trans('cruds.desa.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="number" name="lng" id="lng" value="{{ old('lng', $desa->lng) }}" step="0.0000000001">
                @if($errors->has('lng'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lng') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.desa.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.desas.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection