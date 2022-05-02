@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.satker.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.satkers.update", [$satker->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kd_satker">{{ trans('cruds.satker.fields.kd_satker') }}</label>
                <input class="form-control {{ $errors->has('kd_satker') ? 'is-invalid' : '' }}" type="text" name="kd_satker" id="kd_satker" value="{{ old('kd_satker', $satker->kd_satker) }}" required>
                @if($errors->has('kd_satker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_satker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.satker.fields.kd_satker_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nm_satker">{{ trans('cruds.satker.fields.nm_satker') }}</label>
                <input class="form-control {{ $errors->has('nm_satker') ? 'is-invalid' : '' }}" type="text" name="nm_satker" id="nm_satker" value="{{ old('nm_satker', $satker->nm_satker) }}" required>
                @if($errors->has('nm_satker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_satker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.satker.fields.nm_satker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kd_kwn">{{ trans('cruds.satker.fields.kd_kwn') }}</label>
                <input class="form-control {{ $errors->has('kd_kwn') ? 'is-invalid' : '' }}" type="number" name="kd_kwn" id="kd_kwn" value="{{ old('kd_kwn', $satker->kd_kwn) }}" step="1">
                @if($errors->has('kd_kwn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_kwn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.satker.fields.kd_kwn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kwn">{{ trans('cruds.satker.fields.kwn') }}</label>
                <input class="form-control {{ $errors->has('kwn') ? 'is-invalid' : '' }}" type="text" name="kwn" id="kwn" value="{{ old('kwn', $satker->kwn) }}">
                @if($errors->has('kwn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kwn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.satker.fields.kwn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tingkat">{{ trans('cruds.satker.fields.tingkat') }}</label>
                <input class="form-control {{ $errors->has('tingkat') ? 'is-invalid' : '' }}" type="text" name="tingkat" id="tingkat" value="{{ old('tingkat', $satker->tingkat) }}">
                @if($errors->has('tingkat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tingkat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.satker.fields.tingkat_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.satker.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Satker::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $satker->status) === (int) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.satker.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.satkers.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection