@can('backdate_banpem_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.backdate-banpems.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.backdateBanpem.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.backdateBanpem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-descAkunBackdateBanpems">
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
                            {{ trans('cruds.backdateBanpem.fields.desc_akun') }}
                        </th>
                        <th>
                            {{ trans('cruds.akun.fields.nama_akun') }}
                        </th>
                        <th>
                            {{ trans('cruds.backdateBanpem.fields.nom_pagu') }}
                        </th>
                        <th>
                            {{ trans('cruds.backdateBanpem.fields.nom_realisasi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($backdateBanpems as $key => $backdateBanpem)
                        <tr data-entry-id="{{ $backdateBanpem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $backdateBanpem->year ?? '' }}
                            </td>
                            <td>
                                {{ $backdateBanpem->kd_akun ?? '' }}
                            </td>
                            <td>
                                {{ $backdateBanpem->desc_akun->kd_akun ?? '' }}
                            </td>
                            <td>
                                {{ $backdateBanpem->desc_akun->nama_akun ?? '' }}
                            </td>
                            <td>
                                {{ $backdateBanpem->nom_pagu ?? '' }}
                            </td>
                            <td>
                                {{ $backdateBanpem->nom_realisasi ?? '' }}
                            </td>
                            <td>
                                @can('backdate_banpem_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.backdate-banpems.show', $backdateBanpem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('backdate_banpem_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.backdate-banpems.edit', $backdateBanpem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('backdate_banpem_delete')
                                    <form action="{{ route('admin.backdate-banpems.destroy', $backdateBanpem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('backdate_banpem_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.backdate-banpems.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-descAkunBackdateBanpems:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection