@extends('layouts.app')
@section('content')
<div class="row justify-content-center" >
    <div class="flex items-center justify-center min-h-screen">
        <div class="card w-screen max-w-md px-6 -mt-16 space-y-8 md:mt-0 md:px-2 ">
            
            <div class="card-body p-4 prose ">
                <h2 class="text-center">{{ trans('panel.site_title') }}</h2>

                <p class="text-center text-muted ">Silahkan {{ trans('global.login') }}</p>

                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        
                        <label class="input-group">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="email"  class="input form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}" />
                        
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </label>
                    </div>
                    

                    <div class="mb-3">
                        <label class="input-group">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="input form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }} " />
                        
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </label>
                        
                    </div>
                    
                    <div class="input-group mb-3">
                        <label class="label cursor-pointer">
                            <input class="checkbox checkbox-secondary form-control" name="remember" type="checkbox" id="remember" />
                            <span class="label-text" style="height: 24px">{{ trans('global.remember_me') }}</span> 
                        </label>
                    </div>

                    
               
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-block btn-primary px-4">
                                {{ trans('global.login') }}
                            </button>
                        </div>
                        <div class="col-12 text-center">
                            @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection