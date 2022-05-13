@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nm_org">{{ trans('cruds.setting.fields.nm_org') }}</label>
                <input class="form-control {{ $errors->has('nm_org') ? 'is-invalid' : '' }}" type="text" name="nm_org" id="nm_org" value="{{ old('nm_org', '') }}">
                @if($errors->has('nm_org'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_org') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.nm_org_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.setting.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telepon">{{ trans('cruds.setting.fields.telepon') }}</label>
                <input class="form-control {{ $errors->has('telepon') ? 'is-invalid' : '' }}" type="text" name="telepon" id="telepon" value="{{ old('telepon', '') }}">
                @if($errors->has('telepon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telepon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.telepon_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection