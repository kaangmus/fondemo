@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <a href="#">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ trans('global.register') }}</p>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name"
                            value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="telephone" required placeholder="Phone Number">
                        @if($errors->has('telephone'))
                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="fax" placeholder="Fax Number">
                        @if($errors->has('fax'))
                        <span class="text-danger"> {{ $errors->first('fax') }}</span>
                        @endif
                        
                    </div>
                    <div class="form-group">
                       
                        <input class="form-control" type="text" name="company" placeholder="company">
                        @if($errors->has('company'))
                        <span class="text-danger">{{ $errors->first('company') }}</span>
                        @endif
                       
                    </div>
                    <div class="form-group">
                       
                        <input class="form-control " type="text" name="companyid" placeholder="companyid">
                            
                        @if($errors->has('companyid'))
                        <span class="text-danger">{{ $errors->first('companyid') }}</span>
                        @endif
                        
                    </div>
                    <div class="form-group">
                        
                        <textarea class="form-control" name="address_1" id="address_1" placeholder="address" required></textarea>
                        @if($errors->has('address_1'))
                        <span class="text-danger">{{ $errors->first('address_1') }}</span>
                        @endif
                       
                    </div>
                    <div class="form-group">
                        
                        <input class="form-control" type="text" name="address_2" placeholder="address">
                            
                        @if($errors->has('address_2'))
                        <span class="text-danger">{{ $errors->first('address_2') }}</span>
                        @endif
                        
                    </div>
                    <div class="form-group">
                      
                        <input class="form-control " type="text" name="city" placeholder="city" required>
                        @if($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                        @endif
                       
                    </div>
                    <div class="form-group">
                        
                        <input class="form-control " type="text" name="post_code" placeholder="post code">
                     
                        @if($errors->has('post_code'))
                        <span class="text-danger">{{ $errors->first('post_code') }}</span>
                        @endif
                       
                    </div>
                    <div class="form-group">
                        
                        <input class="form-control" type="text" name="country"
                           placeholder="country" required>
                        @if($errors->has('country'))
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                        @endif
                        
                    </div>
                    <div class="form-group">
                        
                        <input class="form-control" type="text" name="region_state"
                           placeholder="region state" required>
                        @if($errors->has('region_state'))
                        <span class="text-danger">{{ $errors->first('region_state') }}</span>
                        @endif
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection