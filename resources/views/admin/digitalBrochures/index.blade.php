@extends('layouts.admin')
@section('content')
<div class="content">
    
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.digital-brochures.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.digitalBrochure.title_singular') }}
                </a>
            </div>
        </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.digitalBrochure.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-DigitalBrochure">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.digitalBrochure.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.digitalBrochure.fields.name') }}
                                    </th>
                                    <th>
                                        Cover Photo
                                    </th>
                                    <th>
                                        {{ trans('cruds.digitalBrochure.fields.pdf') }}
                                    </th>
                                    <th>
                                        Published at
                                    </th>
                                    
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($digitalBrochures as $key => $digitalBrochure)
                                    <tr data-entry-id="{{ $digitalBrochure->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $digitalBrochure->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $digitalBrochure->name ?? '' }}
                                        </td>
                                        <td>
                                           @if($digitalBrochure->digitalphoto)
                                                <a href="{{ $digitalBrochure->digitalphoto->getUrl() }}" target="_blank">
                                                    <img src="{{ $digitalBrochure->digitalphoto->getUrl('medium') }}" width="50px" height="50px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($digitalBrochure->pdf)
                                                <a href="{{ $digitalBrochure->pdf->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('d F Y',strtotime($digitalBrochure->published_at)) ?? '' }}
                                        
                                        </td>
                                        <td>
                                            
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.digital-brochures.show', $digitalBrochure->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            

                                            
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.digital-brochures.edit', $digitalBrochure->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            

                                            
                                                <form action="{{ route('admin.digital-brochures.destroy', $digitalBrochure->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('digital_brochure_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.digital-brochures.massDestroy') }}",
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
  $('.datatable-DigitalBrochure:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection