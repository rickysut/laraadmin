@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.coa.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.coas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="coa_code">{{ trans('cruds.coa.fields.coa_code') }}</label>
                <input class="form-control {{ $errors->has('coa_code') ? 'is-invalid' : '' }}" type="number" name="coa_code" id="coa_code" value="{{ old('coa_code', '') }}" step="1">
                @if($errors->has('coa_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coa_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.coa.fields.coa_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="coa_name">{{ trans('cruds.coa.fields.coa_name') }}</label>
                <input class="form-control {{ $errors->has('coa_name') ? 'is-invalid' : '' }}" type="text" name="coa_name" id="coa_name" value="{{ old('coa_name', '') }}" required>
                @if($errors->has('coa_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coa_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.coa.fields.coa_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coa_parent_id">{{ trans('cruds.coa.fields.coa_parent') }}</label>
                <select class="form-control select2 {{ $errors->has('coa_parent') ? 'is-invalid' : '' }}" name="coa_parent_id" id="coa_parent_id">
                    @foreach($coa_parents as $id => $entry)
                        <option value="{{ $id }}" {{ old('coa_parent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('coa_parent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coa_parent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.coa.fields.coa_parent_helper') }}</span>
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