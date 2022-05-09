@extends('layouts.admin')
@section('content')
@can('provinsi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.provinsis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.provinsi.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Provinsi', 'route' => 'admin.provinsis.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.provinsi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Provinsi">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.provinsi.fields.kd_prop') }}
                    </th>
                    <th>
                        {{ trans('cruds.provinsi.fields.nm_prop') }}
                    </th>
                    <th>
                        {{ trans('cruds.provinsi.fields.kd_bast') }}
                    </th>
                    <th>
                        {{ trans('cruds.provinsi.fields.lat') }}
                    </th>
                    <th>
                        {{ trans('cruds.provinsi.fields.lng') }}
                    </th>
                    <th>
                        {{ trans('cruds.provinsi.fields.kd_satker') }}
                    </th>
                    <th>
                        {{ trans('cruds.satker.fields.id') }}
                    </th>
                    <th width="120">
                        {{ trans('global.actions') }}
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
  $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('provinsi_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.provinsis.massDestroy') }}",
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
    ajax: "{{ route('admin.provinsis.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'kd_prop', name: 'kd_prop' },
        { data: 'nm_prop', name: 'nm_prop' },
        { data: 'kd_bast', name: 'kd_bast' },
        { data: 'lat', name: 'lat' , class: 'text-right'},
        { data: 'lng', name: 'lng' , class: 'text-right'},
        { data: 'kd_satker_kd_satker', name: 'kd_satker.kd_satker', render: function (data, type, row) {
            if ( type === 'display' ) {
                var url = '{{ route("admin.satkers.show", ":id") }}';
                url = url.replace(':id', row.kd_satker_id);
                @can('satker_show')
                    return "<a style='color:#9a0c0b;' href='"+url+"'>&#10140;</a>&nbsp&nbsp" + data;    
                @endcan
                @cannot('satker_show')
                    return data;
                @endcannot
                
            }    
        }},
        { data: 'kd_satker_id', name: 'kd_satker.id' ,  visible: false},
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Provinsi').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection