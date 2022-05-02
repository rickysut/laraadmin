@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.backdateBanpem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.backdate-banpems.update", [$backdateBanpem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="year">{{ trans('cruds.backdateBanpem.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', $backdateBanpem->year) }}" step="1">
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kd_akun_id">{{ trans('cruds.backdateBanpem.fields.kd_akun') }}</label>
                <select class="form-control select2 {{ $errors->has('kd_akun_id') ? 'is-invalid' : '' }}" name="kd_akun_id" id="kd_akun_id" required>
                    @foreach($kd_akuns as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kd_akun_id') ? old('kd_akun_id') : $backdateBanpem->kd_akun->kd_akun ?? '') == $id ? 'selected' : '' }}>{{ $id }} - {{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kd_akun_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_akun_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.kd_akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom_pagu">{{ trans('cruds.backdateBanpem.fields.nom_pagu') }}</label>
                <input class="form-control {{ $errors->has('nom_pagu') ? 'is-invalid' : '' }}" type="number" name="nom_pagu" id="nom_pagu" value="{{ old('nom_pagu', $backdateBanpem->nom_pagu) }}" step="0.01" required>
                @if($errors->has('nom_pagu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_pagu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.nom_pagu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom_realisasi">{{ trans('cruds.backdateBanpem.fields.nom_realisasi') }}</label>
                <input class="form-control {{ $errors->has('nom_realisasi') ? 'is-invalid' : '' }}" type="number" name="nom_realisasi" id="nom_realisasi" value="{{ old('nom_realisasi', $backdateBanpem->nom_realisasi) }}" step="0.01" required>
                @if($errors->has('nom_realisasi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_realisasi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.nom_realisasi_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.backdate-banpems.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection