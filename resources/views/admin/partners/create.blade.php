@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.partner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.partners.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.partner.fields.partner_type') }}</label>
                <select class="form-control {{ $errors->has('partner_type') ? 'is-invalid' : '' }}" name="partner_type" id="partner_type" required>
                    <option value disabled {{ old('partner_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Partner::PARTNER_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('partner_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="partner_code">{{ trans('cruds.partner.fields.partner_code') }}</label>
                <input class="form-control {{ $errors->has('partner_code') ? 'is-invalid' : '' }}" type="number" name="partner_code" id="partner_code" value="{{ old('partner_code', '') }}" step="1" required>
                @if($errors->has('partner_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="partner_name">{{ trans('cruds.partner.fields.partner_name') }}</label>
                <input class="form-control {{ $errors->has('partner_name') ? 'is-invalid' : '' }}" type="text" name="partner_name" id="partner_name" value="{{ old('partner_name', '') }}" required>
                @if($errors->has('partner_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partner_address">{{ trans('cruds.partner.fields.partner_address') }}</label>
                <textarea class="form-control {{ $errors->has('partner_address') ? 'is-invalid' : '' }}" name="partner_address" id="partner_address">{{ old('partner_address') }}</textarea>
                @if($errors->has('partner_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partner_email">{{ trans('cruds.partner.fields.partner_email') }}</label>
                <input class="form-control {{ $errors->has('partner_email') ? 'is-invalid' : '' }}" type="email" name="partner_email" id="partner_email" value="{{ old('partner_email') }}">
                @if($errors->has('partner_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partner_phone">{{ trans('cruds.partner.fields.partner_phone') }}</label>
                <input class="form-control {{ $errors->has('partner_phone') ? 'is-invalid' : '' }}" type="text" name="partner_phone" id="partner_phone" value="{{ old('partner_phone', '') }}">
                @if($errors->has('partner_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partner_pic">{{ trans('cruds.partner.fields.partner_pic') }}</label>
                <input class="form-control {{ $errors->has('partner_pic') ? 'is-invalid' : '' }}" type="text" name="partner_pic" id="partner_pic" value="{{ old('partner_pic', '') }}">
                @if($errors->has('partner_pic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_pic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_pic_helper') }}</span>
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