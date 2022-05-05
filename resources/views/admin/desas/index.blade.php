@extends('layouts.admin')
@section('content')
<style>
    table.dataTable td > span {
        margin-left: 0.2em;
        opacity: 1;
        float: left;
        cursor: pointer;
    }
</style>
@can('desa_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.desas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.desa.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Desa', 'route' => 'admin.desas.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.desa.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Desa">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.kecamatan.fields.id') }} 
                    </th>
                    <th>
                        {{ trans('cruds.desa.fields.kd_kec') }}
                    </th>
                    <!--th>
                        {{ trans('cruds.kecamatan.fields.nm_kec') }}
                    </th-->
                    <th>
                        {{ trans('cruds.desa.fields.kd_desa') }}
                    </th>
                    <th>
                        {{ trans('cruds.desa.fields.nm_desa') }}
                    </th>
                    <th width="10">
                        {{ trans('cruds.desa.fields.kd_bast') }}
                    </th>
                    <th width="20">
                        {{ trans('cruds.desa.fields.lat') }}
                    </th>
                    <th width="20">
                        {{ trans('cruds.desa.fields.lng') }}
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
@can('desa_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.desas.massDestroy') }}",
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
    ajax: "{{ route('admin.desas.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'kd_kec_id', name: 'kd_kec.id', visible: false },
        { data: 'kd_kec_kd_kec', name: 'kd_kec.kd_kec' , render: function (data, type, row) {
            if ( type === 'display' ) {
                var url = '{{ route("admin.kecamatans.show", ":id") }}';
                url = url.replace(':id', row.kd_kec_id);
                return "<a style='color:#9a0c0b;' href='"+url+"'>&#10140;</a>&nbsp&nbsp" + data;
            }    
        }},
        //{ data: 'kd_kec.nm_kec', name: 'kd_kec.nm_kec' },
        { data: 'kd_desa', name: 'kd_desa' },
        { data: 'nm_desa', name: 'nm_desa' },
        { data: 'kd_bast', name: 'kd_bast' },   
        { data: 'lat', name: 'lat' , class: 'text-right'},
        { data: 'lng', name: 'lng' , class: 'text-right'},
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 25,
  };
  
  table = $('.datatable-Desa').DataTable(dtOverrideGlobals);
  
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection