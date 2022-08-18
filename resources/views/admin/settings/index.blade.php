@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
	  <div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
		  <div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>{{ trans('cruds.setting.title') }}</i></span>
				</h2>
                @can('setting_create')
				<div class="panel-toolbar">
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.settings.create') }}" data-toggle="tooltip" title="tambah data" data-original-title="tambah data">
						{{ trans('global.add') }} {{ trans('cruds.setting.title_singular') }}
					</a>
				</div>
				@endcan
			</div>
			<div class="panel-container show">
			  <div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">

                                <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Setting w-100">
                                    <thead>
                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th style="display: none">
                                                {{ trans('cruds.setting.fields.id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.setting.fields.nm_org') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.setting.fields.alamat') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.setting.fields.telepon') }}
                                            </th>
                                            <th style="width:15%">
                                                {{ trans('global.actions') }}
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.settings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.settings.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'id', name: 'id', visible: false},
      { data: 'nm_org', name: 'nm_org' },
      { data: 'alamat', name: 'alamat' },
      { data: 'telepon', name: 'telepon' },
      { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Setting').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection