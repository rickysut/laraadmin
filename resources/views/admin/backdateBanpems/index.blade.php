@extends('layouts.admin')
@section('content')
@can('backdate_banpem_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.backdate-banpems.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.backdateBanpem.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'BackdateBanpem', 'route' => 'admin.backdate-banpems.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.backdateBanpem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-BackdateBanpem">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.backdateBanpem.fields.year') }}
                    </th>
                    <th>
                        {{ trans('cruds.backdateBanpem.fields.kd_akun') }}
                    </th>
                    <th>
                        {{ trans('cruds.akun.fields.nama_akun') }}
                    </th>
                    <th>
                        {{ trans('cruds.akun.fields.jenis') }}
                    </th>
                    <th>
                        {{ trans('cruds.backdateBanpem.fields.nom_pagu') }}
                    </th>
                    <th>
                        {{ trans('cruds.backdateBanpem.fields.nom_realisasi') }}
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
@can('backdate_banpem_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.backdate-banpems.massDestroy') }}",
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
    ajax: "{{ route('admin.backdate-banpems.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'year', name: 'year' },
{ data: 'kd_akun_kd_akun', name: 'kd_akun.kd_akun' },
{ data: 'kd_akun.nama_akun', name: 'kd_akun.nama_akun' },
{ data: 'kd_akun.jenis', name: 'kd_akun.jenis' },
{ data: 'nom_pagu', name: 'nom_pagu', class: 'text-right' },
{ data: 'nom_realisasi', name: 'nom_realisasi' , class: 'text-right' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-BackdateBanpem').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection