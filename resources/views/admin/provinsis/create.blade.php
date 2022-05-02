@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.provinsi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.provinsis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kd_prop">{{ trans('cruds.provinsi.fields.kd_prop') }}</label>
                <input class="form-control {{ $errors->has('kd_prop') ? 'is-invalid' : '' }}" type="number" name="kd_prop" id="kd_prop" value="{{ old('kd_prop', '') }}" step="1" required>
                @if($errors->has('kd_prop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_prop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.provinsi.fields.kd_prop_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nm_prop">{{ trans('cruds.provinsi.fields.nm_prop') }}</label>
                <input class="form-control {{ $errors->has('nm_prop') ? 'is-invalid' : '' }}" type="text" name="nm_prop" id="nm_prop" value="{{ old('nm_prop', '') }}" required>
                @if($errors->has('nm_prop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_prop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.provinsi.fields.nm_prop_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kd_bast">{{ trans('cruds.provinsi.fields.kd_bast') }}</label>
                <input class="form-control {{ $errors->has('kd_bast') ? 'is-invalid' : '' }}" type="text" name="kd_bast" id="kd_bast" value="{{ old('kd_bast', '') }}">
                @if($errors->has('kd_bast'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_bast') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.provinsi.fields.nm_prop_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.provinsi.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number" name="lat" id="lat" value="{{ old('lat', '') }}" step="0.0000000001">
                @if($errors->has('lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.provinsi.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lng">{{ trans('cruds.provinsi.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="number" name="lng" id="lng" value="{{ old('lng', '') }}" step="0.0000000001">
                @if($errors->has('lng'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lng') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.provinsi.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kd_satker">{{ trans('cruds.provinsi.fields.kd_satker') }}</label>
                <select class="form-control select2 {{ $errors->has('kd_satker') ? 'is-invalid' : '' }}" name="kd_satker_id" id="kd_satker_id" >
                    @foreach($kd_satkers as $id => $entry)
                        <option value="{{ $id }}" {{ old('kd_satker') == $id ? 'selected' : '' }}>{{ $id }} - {{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kd_satker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_satker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.provinsi.fields.kd_satker_helper') }}</span>
            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.provinsis.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection