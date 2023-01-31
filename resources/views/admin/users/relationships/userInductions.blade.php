<div class="m-3">
    @can('induction_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.inductions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.induction.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.induction.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-userInductions">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.induction.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.induction.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.induction.fields.machine') }}
                            </th>
                            <th>
                                {{ trans('cruds.induction.fields.inductor') }}
                            </th>
                            <th>
                                {{ trans('cruds.induction.fields.inducted_by') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inductions as $key => $induction)
                            <tr data-entry-id="{{ $induction->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $induction->id ?? '' }}
                                </td>
                                <td>
                                    {{ $induction->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $induction->machine->name ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $induction->inductor ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $induction->inductor ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $induction->inducted_by->name ?? '' }}
                                </td>
                                <td>
                                    @can('induction_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.inductions.show', $induction->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('induction_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.inductions.edit', $induction->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('induction_delete')
                                        <form action="{{ route('admin.inductions.destroy', $induction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('induction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.inductions.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-userInductions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection