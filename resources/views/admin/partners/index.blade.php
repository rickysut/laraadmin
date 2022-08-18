@extends('layouts.admin')
@section('content')
@can('partner_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.partners.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.partner.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Partner', 'route' => 'admin.partners.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.partner.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Partner">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th hidden>
                            {{ trans('cruds.partner.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.partner_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.partner_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.partner_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.partner_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.partner_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.partner_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.partner_pic') }}
                        </th>
                        <th style="width:15%">
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $key => $partner)
                        <tr data-entry-id="{{ $partner->id }}">
                            <td>

                            </td>
                            <td hidden>
                                {{ $partner->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Partner::PARTNER_TYPE_SELECT[$partner->partner_type] ?? '' }}
                            </td>
                            <td>
                                {{ $partner->partner_code ?? '' }}
                            </td>
                            <td>
                                {{ $partner->partner_name ?? '' }}
                            </td>
                            <td>
                                {{ $partner->partner_address ?? '' }}
                            </td>
                            <td>
                                {{ $partner->partner_email ?? '' }}
                            </td>
                            <td>
                                {{ $partner->partner_phone ?? '' }}
                            </td>
                            <td>
                                {{ $partner->partner_pic ?? '' }}
                            </td>
                            <td>
                               
                                @can('partner_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.partners.edit', $partner->id) }}">
                                        <i class="fal fa-edit"></i>
                                    </a>
                                @endcan

                                @can('partner_delete')
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}"><i class="fas fa-trash"></i></button>
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('partner_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.partners.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Partner:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection