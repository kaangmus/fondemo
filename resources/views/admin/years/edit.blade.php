@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.year.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.years.update", [$year->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="year">{{ trans('cruds.year.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', $year->year) }}">
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.year.fields.year_helper') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="ngos">{{ trans('cruds.year.fields.ngo') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ngos') ? 'is-invalid' : '' }}" name="ngos[]" id="ngos" multiple>
                    @foreach($ngos as $id => $ngo)
                        <option value="{{ $id }}" {{ (in_array($id, old('ngos', [])) || $year->yearngos->contains($id)) ? 'selected' : '' }}>{{ $ngo }}</option>
                    @endforeach
                </select>
                @if($errors->has('ngos'))
                    <span class="text-danger">{{ $errors->first('ngos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.year.fields.ngo_helper') }}</span>
            </div> -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection