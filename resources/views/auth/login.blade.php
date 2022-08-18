@extends('layouts.app')
@section('content')
<div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
	<div class="row">
		<div class="col col-md-6 col-lg-7 hidden-sm-down">
			<h2 class="fs-xxl fw-500 mt-4 text-white">
				{{ trans('smartadmin.welcome') }}
				<small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
					{{ trans('smartadmin.home_subtitle') }}
				</small>
			</h2>
			
		</div>
		<div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
			<h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
				{{ trans('smartadmin.welcome') }}
			</h1>
			<div class="card p-4 rounded-plus bg-faded shadow">
				@if(session('message'))
				<div class="alert alert-info" role="alert">
					{{ session('message') }}
				</div>
				@endif
				<div class="h6 text-center text-muted mb-4">{{ trans('smartadmin.login_title') }}</div>
				<form id="js-login" novalidate="" method="POST" action="{{ route('login') }}">
					@csrf
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<span class="fal fa-user"></span>
								</div>
							</div>
							<input id="username" name="username" type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" required autocomplete="username" autofocus placeholder="{{ trans('global.login_username') }}" value="{{ old('username', null) }}" />
							@if($errors->has('username'))
							<div class="invalid-feedback">
								{{ $errors->first('username') }}
							</div>
							@endif
						</div>
						<div class="help-block text-muted">{{ trans('smartadmin.help_username') }}</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<span class="fal fa-lock"></span>
								</div>
							</div>
							<input id="password" name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}" />
							@if($errors->has('password'))
							<div class="invalid-feedback">
								{{ $errors->first('password') }}
							</div>
							@endif
						</div>
						<div class="help-block">{{ trans('smartadmin.help_password') }}</div>
					</div>
					<div class="form-group text-left">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="remember" name="remember">
							<label class="custom-control-label" for="remember">
								{{ trans('global.remember_me') }}
							</label>
						</div>
					</div>
					<div class="row no-gutters">
						<div class="col-lg-6 pr-lg-1 my-2">
							<button type="submit" class="btn btn-danger btn-block btn-lg">
								{{ trans('global.login') }}
							</button>
						</div>
						<div class="col-lg-6 pl-lg-1 my-2">
							@if(Route::has('password.request'))
							<a class="btn btn-block btn-link px-0" href="{{ route('password.request') }}">
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