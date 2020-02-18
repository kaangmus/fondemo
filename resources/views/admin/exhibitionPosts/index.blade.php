@extends('layouts.admin')
@section('content')
@can('exhibition_post_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.exhibition-posts.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.exhibitionPost.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.exhibitionPost.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExhibitionPost">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.exhibitionPost.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibitionPost.fields.exhibition_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibitionPost.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibitionPost.fields.feature_image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exhibitionPosts as $key => $exhibitionPost)
                        <tr data-entry-id="{{ $exhibitionPost->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $exhibitionPost->id ?? '' }}
                            </td>
                            <td>
                                {{ $exhibitionPost->exhibition_category->title ?? '' }}
                            </td>
                            <td>
                                {{ $exhibitionPost->name ?? '' }}
                            </td>
                            <td>
                                @if($exhibitionPost->feature_image)
                                    <a href="{{ $exhibitionPost->feature_image->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('exhibition_post_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.exhibition-posts.show', $exhibitionPost->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('exhibition_post_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.exhibition-posts.edit', $exhibitionPost->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('exhibition_post_delete')
                                    <form action="{{ route('admin.exhibition-posts.destroy', $exhibitionPost->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('exhibition_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.exhibition-posts.massDestroy') }}",
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
  $('.datatable-ExhibitionPost:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection