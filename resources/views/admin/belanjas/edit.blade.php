@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.belanja.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.belanjas.update", [$belanja->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tahun">{{ trans('cruds.belanja.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="number" name="tahun" id="tahun" value="{{ old('tahun', $belanja->tahun) }}" step="1" required>
                @if($errors->has('tahun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.tahun_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kewenangan">{{ trans('cruds.belanja.fields.kewenangan') }}</label>
                <input class="form-control {{ $errors->has('kewenangan') ? 'is-invalid' : '' }}" type="text" name="kewenangan" id="kewenangan" value="{{ old('kewenangan', $belanja->kewenangan) }}" required>
                @if($errors->has('kewenangan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kewenangan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.kewenangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pagu">{{ trans('cruds.belanja.fields.pagu') }}</label>
                <input class="form-control {{ $errors->has('pagu') ? 'is-invalid' : '' }}" type="number" name="pagu" id="pagu" value="{{ old('pagu', $belanja->pagu) }}" step="0.01" required>
                @if($errors->has('pagu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pagu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.pagu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="realisasi">{{ trans('cruds.belanja.fields.realisasi') }}</label>
                <input class="form-control {{ $errors->has('realisasi') ? 'is-invalid' : '' }}" type="number" name="realisasi" id="realisasi" value="{{ old('realisasi', $belanja->realisasi) }}" step="0.01" required>
                @if($errors->has('realisasi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('realisasi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.realisasi_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.belanjas.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection