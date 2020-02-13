@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ngo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ngos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ngo.fields.id') }}
                        </th>
                        <td>
                            {{ $ngo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ngo.fields.name') }}
                        </th>
                        <td>
                            {{ $ngo->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ngo.fields.photo') }}
                        </th>
                        <td>
                            @if($ngo->photo)
                                <a href="{{ $ngo->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $ngo->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ngo.fields.videolink') }}
                        </th>
                        <td>
                            {{ $ngo->videolink }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ngo.fields.donate') }}
                        </th>
                        <td>
                            {{ $ngo->donate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ngo.fields.species') }}
                        </th>
                        <td>
                            @foreach($ngo->species as $key => $species)
                                <span class="label label-info">{{ $species->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ngo.fields.description') }}
                        </th>
                        <td>
                            {{ $ngo->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ngos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection