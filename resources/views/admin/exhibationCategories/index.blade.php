@extends('layouts.admin')
@section('content')
@can('exhibation_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.exhibation-categories.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.exhibationCategory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.exhibationCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExhibationCategory">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.type') }}
                        </th>
                        <!-- <th>
                            {{ trans('cruds.exhibationCategory.fields.e_cat_video') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.e_cat_post_video') }}
                        </th>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.e_cat_post_description') }}
                        </th> -->
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.public_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exhibationCategories as $key => $exhibationCategory)
                        <tr data-entry-id="{{ $exhibationCategory->id }}">
                            
                            <td>
                                {{ $exhibationCategory->id ?? '' }}
                            </td>
                            <td>
                                {{ $exhibationCategory->year->year ?? '' }}
                            </td>
                            <td>
                                {{ $exhibationCategory->title ?? '' }}
                            </td>
                            <td>
                                {{ App\ExhibationCategory::TYPE_SELECT[$exhibationCategory->type] ?? '' }}
                            </td>
                             <td>
                                {{ date('d F Y',strtotime($exhibationCategory->public_date)) ?? '' }}
                            </td>
                           <!--  <td>
                                @if($exhibationCategory->e_cat_video)
                                    <a href="{{ $exhibationCategory->e_cat_video->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($exhibationCategory->e_cat_post_video)
                                    <a href="{{ $exhibationCategory->e_cat_post_video->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $exhibationCategory->e_cat_post_description ?? '' }}
                            </td> -->
                            <td>
                                @can('exhibation_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.exhibation-categories.show', $exhibationCategory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('exhibation_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.exhibation-categories.edit', $exhibationCategory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('exhibation_category_delete')
                                    <form action="{{ route('admin.exhibation-categories.destroy', $exhibationCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('exhibation_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.exhibation-categories.massDestroy') }}",
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
  $('.datatable-ExhibationCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection