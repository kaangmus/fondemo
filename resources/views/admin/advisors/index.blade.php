@extends('layouts.admin')
@section('content')
<div class="content">
   
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.advisors.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.advisor.title_singular') }}
                </a>
            </div>
        </div>
  
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.advisor.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Advisor">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.advisor.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advisor.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advisor.fields.photp') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.advisor.fields.level') }}
                                    </th>
                                    <th>
                                        Description
                                    </th>

                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        published at
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($advisors as $key => $advisor)
                                    <tr data-entry-id="{{ $advisor->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $advisor->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $advisor->name ?? '' }}
                                        </td>
                                        <td>
                                            @if($advisor->photp)
                                                <a href="{{ $advisor->photp->getUrl() }}" target="_blank">
                                                    <img src="{{ $advisor->photp->getUrl('thumb') }}" width="50px" height="50px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $advisor->level ?? '' }}
                                        </td>
                                        <td>
                                            {{$advisor->description ?? ''}}
                                        </td>
                                        <td>
                                            {{ App\Advisor::STATUS_SELECT[$advisor->status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ date('d F Y',strtotime($advisor->published_at)) ?? '' }}
                                        </td>
                                        <td>
                                           
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.advisors.show', $advisor->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                           

                                            
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.advisors.edit', $advisor->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                           

                                            
                                                <form action="{{ route('admin.advisors.destroy', $advisor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('advisor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.advisors.massDestroy') }}",
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
  $('.datatable-Advisor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection