@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.species.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.species.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.id') }}
                        </th>
                        <td>
                            {{ $species->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.name') }}
                        </th>
                        <td>
                            {{ $species->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.image') }}
                        </th>
                        <td>
                            @if($species->image)
                                <a href="{{ $species->image->getUrl() }}" target="_blank">
                                    <img src="{{ $species->image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.species.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection