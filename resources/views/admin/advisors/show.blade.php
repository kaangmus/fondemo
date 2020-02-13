@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.advisor.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.advisors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.advisor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $advisor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.advisor.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $advisor->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.advisor.fields.photp') }}
                                    </th>
                                    <td>
                                        @if($advisor->photp)
                                            <a href="{{ $advisor->photp->getUrl() }}" target="_blank">
                                                <img src="{{ $advisor->photp->getUrl('thumb') }}" width="50px" height="50px">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.advisor.fields.level') }}
                                    </th>
                                    <td>
                                        {{ $advisor->level }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.advisor.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $advisor->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.advisor.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Advisor::STATUS_SELECT[$advisor->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.advisors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection