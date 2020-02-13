@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_nmae">{{ trans('cruds.user.fields.first_nmae') }}</label>
                <input class="form-control {{ $errors->has('first_nmae') ? 'is-invalid' : '' }}" type="text" name="first_nmae" id="first_nmae" value="{{ old('first_nmae', '') }}" required>
                @if($errors->has('first_nmae'))
                    <span class="text-danger">{{ $errors->first('first_nmae') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.first_nmae_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telephone">{{ trans('cruds.user.fields.telephone') }}</label>
                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" id="telephone" value="{{ old('telephone', '') }}" required>
                @if($errors->has('telephone'))
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.telephone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.user.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', '') }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.user.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}">
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="companyid">{{ trans('cruds.user.fields.companyid') }}</label>
                <input class="form-control {{ $errors->has('companyid') ? 'is-invalid' : '' }}" type="text" name="companyid" id="companyid" value="{{ old('companyid', '') }}">
                @if($errors->has('companyid'))
                    <span class="text-danger">{{ $errors->first('companyid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.companyid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_1">{{ trans('cruds.user.fields.address_1') }}</label>
                <textarea class="form-control {{ $errors->has('address_1') ? 'is-invalid' : '' }}" name="address_1" id="address_1" required>{{ old('address_1') }}</textarea>
                @if($errors->has('address_1'))
                    <span class="text-danger">{{ $errors->first('address_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.address_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_2">{{ trans('cruds.user.fields.address_2') }}</label>
                <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', '') }}">
                @if($errors->has('address_2'))
                    <span class="text-danger">{{ $errors->first('address_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.user.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="post_code">{{ trans('cruds.user.fields.post_code') }}</label>
                <input class="form-control {{ $errors->has('post_code') ? 'is-invalid' : '' }}" type="text" name="post_code" id="post_code" value="{{ old('post_code', '') }}">
                @if($errors->has('post_code'))
                    <span class="text-danger">{{ $errors->first('post_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.post_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.user.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}" required>
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="region_state">{{ trans('cruds.user.fields.region_state') }}</label>
                <input class="form-control {{ $errors->has('region_state') ? 'is-invalid' : '' }}" type="text" name="region_state" id="region_state" value="{{ old('region_state', '') }}" required>
                @if($errors->has('region_state'))
                    <span class="text-danger">{{ $errors->first('region_state') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.region_state_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection