@can('provinsi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.provinsis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.provinsi.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.provinsi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-kdSatkerProvinsis">
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
                            {{ trans('cruds.provinsi.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.provinsi.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.provinsi.fields.tz') }}
                        </th>
                        <th>
                            {{ trans('cruds.provinsi.fields.path') }}
                        </th>
                        <th>
                            {{ trans('cruds.provinsi.fields.kd_satker') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provinsis as $key => $provinsi)
                        <tr data-entry-id="{{ $provinsi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $provinsi->kd_prop ?? '' }}
                            </td>
                            <td>
                                {{ $provinsi->nm_prop ?? '' }}
                            </td>
                            <td>
                                {{ $provinsi->lat ?? '' }}
                            </td>
                            <td>
                                {{ $provinsi->lng ?? '' }}
                            </td>
                            <td>
                                {{ $provinsi->tz ?? '' }}
                            </td>
                            <td>
                                {{ $provinsi->path ?? '' }}
                            </td>
                            <td>
                                {{ $provinsi->kd_satker->kd_satker ?? '' }}
                            </td>
                            <td>
                                @can('provinsi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.provinsis.show', $provinsi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('provinsi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.provinsis.edit', $provinsi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('provinsi_delete')
                                    <form action="{{ route('admin.provinsis.destroy', $provinsi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('provinsi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.provinsis.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-kdSatkerProvinsis:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection