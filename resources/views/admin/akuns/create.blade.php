@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.akun.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.akuns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kd_akun">{{ trans('cruds.akun.fields.kd_akun') }}</label>
                <input class="form-control {{ $errors->has('kd_akun') ? 'is-invalid' : '' }}" type="number" name="kd_akun" id="kd_akun" value="{{ old('kd_akun', '') }}" step="1" required>
                @if($errors->has('kd_akun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_akun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.kd_akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_akun">{{ trans('cruds.akun.fields.nama_akun') }}</label>
                <input class="form-control {{ $errors->has('nama_akun') ? 'is-invalid' : '' }}" type="text" name="nama_akun" id="nama_akun" value="{{ old('nama_akun', '') }}" required>
                @if($errors->has('nama_akun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_akun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.nama_akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.akun.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Akun::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '1') === (int) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.akun.fields.pendekatan') }}</label>
                <select class="form-control {{ $errors->has('pendekatan') ? 'is-invalid' : '' }}" name="pendekatan" id="pendekatan" required>
                    <option value disabled {{ old('pendekatan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Akun::PENDEKATAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('pendekatan', 'Asset') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('pendekatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pendekatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.pendekatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jenis">{{ trans('cruds.akun.fields.jenis') }}</label>
                <input class="form-control {{ $errors->has('jenis') ? 'is-invalid' : '' }}" type="text" name="jenis" id="jenis" value="{{ old('jenis', '') }}" required>
                @if($errors->has('jenis'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.jenis_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.akuns.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection