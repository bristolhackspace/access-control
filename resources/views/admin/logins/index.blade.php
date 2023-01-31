@extends('layouts.admin')
@section('content')
@can('login_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.logins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.login.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.login.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Login">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.login.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.login.fields.machine') }}
                        </th>
                        <th>
                            {{ trans('cruds.login.fields.card') }}
                        </th>
                        <th>
                            {{ trans('cruds.login.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logins as $key => $login)
                        <tr data-entry-id="{{ $login->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $login->id ?? '' }}
                            </td>
                            <td>
                                {{ $login->machine->name ?? '' }}
                            </td>
                            <td>
                                {{ $login->card->number ?? '' }}
                            </td>
                            <td>
                                {{ $login->status ?? '' }}
                            </td>
                            <td>
                                @can('login_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.logins.show', $login->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('login_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.logins.edit', $login->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('login_delete')
                                    <form action="{{ route('admin.logins.destroy', $login->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('login_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.logins.massDestroy') }}",
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
  let table = $('.datatable-Login:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection