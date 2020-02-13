@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.species.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.species.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.species.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Species">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.species.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.image') }}
                        </th>
                        <th>
                           Type
                        </th>
                        <th>
                           Published Date
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($species as $key => $species)
                        <tr data-entry-id="{{ $species->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $species->id ?? '' }}
                            </td>
                            <td>
                                {{ $species->name ?? '' }}
                            </td>
                            
                            <td>
                                @if($species->image)
                                    <a href="{{ $species->image->getUrl() }}" target="_blank">
                                        <img src="{{ $species->image->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Species::TYPE_SELECT[$species->type] ?? '' }}
                            </td>
                            <td>
                                {{ date('d F Y',strtotime($species->published_at)) ?? '' }}
                              
                            </td>
                            <td>
                               
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.species.show', $species->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                

                              
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.species.edit', $species->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                             

                                
                                    <form action="{{ route('admin.species.destroy', $species->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                               

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
@can('species_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.species.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Species:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection