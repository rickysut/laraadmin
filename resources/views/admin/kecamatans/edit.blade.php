@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.kecamatan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kecamatans.update", [$kecamatan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kd_kab_id">{{ trans('cruds.kecamatan.fields.kd_kab') }}</label>
                <select class="form-control select2 {{ $errors->has('kd_kab') ? 'is-invalid' : '' }}" name="kd_kab_id" id="kd_kab_id" required>
                    @foreach($kd_kabs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kd_kab_id') ? old('kd_kab_id') : $kecamatan->kd_kab_id ?? '') == $id ? 'selected' : '' }}>{{ $id }} - {{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kd_kab'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_kab') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kecamatan.fields.kd_kab_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kd_kec">{{ trans('cruds.kecamatan.fields.kd_kec') }}</label>
                <input class="form-control {{ $errors->has('kd_kec') ? 'is-invalid' : '' }}" type="number" name="kd_kec" id="kd_kec" value="{{ old('kd_kec', $kecamatan->kd_kec) }}" step="1" required>
                @if($errors->has('kd_kec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_kec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kecamatan.fields.kd_kec_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nm_kec">{{ trans('cruds.kecamatan.fields.nm_kec') }}</label>
                <input class="form-control {{ $errors->has('nm_kec') ? 'is-invalid' : '' }}" type="text" name="nm_kec" id="nm_kec" value="{{ old('nm_kec', $kecamatan->nm_kec) }}" required>
                @if($errors->has('nm_kec'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_kec') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kecamatan.fields.nm_kec_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kd_bast">{{ trans('cruds.kecamatan.fields.kd_bast') }}</label>
                <input class="form-control {{ $errors->has('kd_bast') ? 'is-invalid' : '' }}" type="text" name="kd_bast" id="kd_bast" value="{{ old('kd_bast', $kecamatan->kd_bast) }}">
                @if($errors->has('kd_bast'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_bast') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kecamatan.fields.kd_bast_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.kecamatan.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number" name="lat" id="lat" value="{{ old('lat', $kecamatan->lat) }}" step="0.0000000001">
                @if($errors->has('lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kecamatan.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lng">{{ trans('cruds.kecamatan.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="number" name="lng" id="lng" value="{{ old('lng', $kecamatan->lng) }}" step="0.0000000001">
                @if($errors->has('lng'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lng') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kecamatan.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.kecamatans.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection