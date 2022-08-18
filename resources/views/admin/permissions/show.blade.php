@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.permission.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.permissions.index') }}">
						{{ trans('global.back_to_list') }}
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">

                            <table class="table table-bordered table-striped">
                                <tbody >
                                    <tr>
                                        <th>
                                            {{ trans('cruds.permission.fields.title') }}
                                        </th>
                                        <td>
                                            {{ $permission->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.permission.fields.perm_type') }}
                                        </th>
                                        <td>
                                            {{ App\Models\Permission::PERM_TYPE_SELECT[$permission->perm_type] ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.permission.fields.grp_title') }}
                                        </th>
                                        <td>
                                            {{ $permission->grp_title }}
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