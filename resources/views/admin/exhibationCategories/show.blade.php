@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.exhibationCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exhibation-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $exhibationCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.year') }}
                        </th>
                        <td>
                            {{ $exhibationCategory->year->year ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $exhibationCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.description') }}
                        </th>
                        <td>
                            {!! $exhibationCategory->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.type') }}
                        </th>
                        <td>
                            {{ App\ExhibationCategory::TYPE_SELECT[$exhibationCategory->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.e_cat_video') }}
                        </th>
                        <td>
                            @if($exhibationCategory->e_cat_video)
                                <a href="{{ $exhibationCategory->e_cat_video->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.e_cat_post_video') }}
                        </th>
                        <td>
                            @if($exhibationCategory->e_cat_post_video)
                                <a href="{{ $exhibationCategory->e_cat_post_video->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.e_cat_post_description') }}
                        </th>
                        <td>
                            {{ $exhibationCategory->e_cat_post_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibationCategory.fields.public_date') }}
                        </th>
                        <td>
                            {{ $exhibationCategory->public_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exhibation-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#exhibition_category_exhibition_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.exhibitionPost.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#exhibition_category_exhibition_galleries" role="tab" data-toggle="tab">
                {{ trans('cruds.exhibitionGallery.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="exhibition_category_exhibition_posts">
            @includeIf('admin.exhibationCategories.relationships.exhibitionCategoryExhibitionPosts', ['exhibitionPosts' => $exhibationCategory->exhibitionCategoryExhibitionPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="exhibition_category_exhibition_galleries">
            @includeIf('admin.exhibationCategories.relationships.exhibitionCategoryExhibitionGalleries', ['exhibitionGalleries' => $exhibationCategory->exhibitionCategoryExhibitionGalleries])
        </div>
    </div>
</div>

@endsection