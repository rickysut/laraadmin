@extends('layouts.admin')
@section('content')
@can('kabupaten_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.kabupatens.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.kabupaten.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Kabupaten', 'route' => 'admin.kabupatens.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.kabupaten.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Kabupaten">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.kabupaten.fields.kd_prop') }}
                    </th>
                    <!--th>
                        {{ trans('cruds.provinsi.fields.nm_prop') }}
                    </th-->
                    <th width="10">
                        {{ trans('cruds.kabupaten.fields.kd_kab') }}
                    </th>
                    <th>
                        {{ trans('cruds.kabupaten.fields.nama_kab') }}
                    </th>
                    <th width="10">
                        {{ trans('cruds.kabupaten.fields.kd_bast') }}
                    </th>
                    <th width="20">
                        {{ trans('cruds.kabupaten.fields.lat') }}
                    </th>
                    <th width="20">
                        {{ trans('cruds.kabupaten.fields.lng') }}
                    </th>
                    
                    <th width="120">
                        &nbsp;
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
    @can('kabupaten_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.kabupatens.massDestroy') }}",
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
    ajax: "{{ route('admin.kabupatens.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'kd_prop_kd_prop', name: 'kd_prop.kd_prop' },
        //{ data: 'kd_prop.nm_prop', name: 'kd_prop.nm_prop' },
        { data: 'kd_kab', name: 'kd_kab' },
        { data: 'nama_kab', name: 'nama_kab' },
        { data: 'kd_bast', name: 'kd_bast' },
        { data: 'lat', name: 'lat' , class: 'text-right'},
        { data: 'lng', name: 'lng' , class: 'text-right'},
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Kabupaten').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection