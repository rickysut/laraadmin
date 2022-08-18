@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.setting.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.settings.index') }}">
						{{ trans('global.back_to_list') }}
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">

                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th hidden>
                                            {{ trans('cruds.setting.fields.id') }}
                                        </th>
                                        <td hidden>
                                            {{ $setting->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.nm_org') }}
                                        </th>
                                        <td>
                                            {{ $setting->nm_org }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.alamat') }}
                                        </th>
                                        <td>
                                            {{ $setting->alamat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.telepon') }}
                                        </th>
                                        <td>
                                            {{ $setting->telepon }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection