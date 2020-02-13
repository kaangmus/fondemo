@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.ngos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.ngo.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.ngo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ngo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ngo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ngo.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.ngo.fields.photo') }}
                        </th>
                        <!-- <th>
                            {{ trans('cruds.ngo.fields.videolink') }}
                        </th> -->
                        <th>
                            {{ trans('cruds.ngo.fields.species') }}
                        </th>
                        <th>
                            {{ trans('cruds.ngo.fields.description') }}
                        </th>
                        <th>
                            Total
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ngos as $key => $ngo)
                        <tr data-entry-id="{{ $ngo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ngo->id ?? '' }}
                            </td>
                            <td>
                                {{ $ngo->name ?? '' }}
                            </td>
                            <td>
                                @if($ngo->photo)
                                    <a href="{{ $ngo->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $ngo->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @else
                                {{ $ngo->videolink ?? '' }}
                                @endif
                            </td>
                            <!-- <td>
                                
                            </td> -->
                      
                            <td>
                                @foreach($ngo->species as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {!! mb_substr($ngo->description,0,100) ?? '' !!}
                            </td>
                                  <td>
                                {{ $ngo->donate ?? '' }}
                            </td>
                            <td>
                               
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ngos.show', $ngo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                              

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ngos.edit', $ngo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                

                               
                                    <form action="{{ route('admin.ngos.destroy', $ngo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ngos.massDestroy') }}",
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


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Ngo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection