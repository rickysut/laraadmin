@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}
    </div-->

    <div class="card-body">
        <form method="POST" action="{{ route("admin.permissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.permission.fields.perm_type') }}</label>
                <select class="form-control {{ $errors->has('perm_type') ? 'is-invalid' : '' }}" name="perm_type" id="perm_type" required>
                    <option value disabled {{ old('perm_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Permission::PERM_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('perm_type', '') ===  $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('perm_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('perm_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.perm_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.permission.fields.grp_title') }}</label>
                <select class="form-control {{ $errors->has('grp_title') ? 'is-invalid' : '' }}" name="grp_title" id="grp_title" required>
                    <option value disabled {{ old('grp_title', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($grpTitle as $key => $label)
                        @if ($label['is_hidden']=='0')
                            <option value="{{ $label['title'] }}" {{ old('grp_title', '') === $label['title'] ? 'selected' : '' }}>{{ $label['title'] }}</option>    
                        @endif
                    @endforeach
                </select>
                @if($errors->has('grp_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grp_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.grp_title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.permissions.index') }}">
                    {{ trans('global.cancel') }}
                </a>
                
            </div>
        </form>
    </div>
</div>



@endsection