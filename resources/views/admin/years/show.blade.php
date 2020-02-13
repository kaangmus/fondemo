@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.year.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.years.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.year.fields.id') }}
                        </th>
                        <td>
                            {{ $year->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.year.fields.year') }}
                        </th>
                        <td>
                            {{ $year->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.year.fields.ngo') }}
                        </th>
                        <td>
                            @foreach($year->yearngos as $key => $ngo)
                                <span class="label label-info">{{ $ngo->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.years.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection