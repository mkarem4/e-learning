@extends('admin.auth.app')

@section('content')

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="#">
										<img src="{{Request::root()}}/admin/app/media/img/logos/logo-2.png">
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title">Sign In To Admin</h3>
									</div>
									<form class="m-login__form m-form needs-validation was-validated validate_form"  method="POST" action="{{app('shared')->get('base_url')}}/admincp/auth/login"  
									 id="form_login">
										@csrf
										<div class="form-group m-form__group">
											<input id="email" class="validate[required] form-control m-input {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" type="text" placeholder="Email" name="email" autocomplete="off"
											 >
											@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('email') }}</strong>
													</span>
											@endif

										</div>
										<div class="form-group m-form__group">
											<input id="password" class="validate[required] form-control m-input m-login__form-input--last {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password"
											 >
											@if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
											@endif

										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
											<label class="m-checkbox m-checkbox--focus">
												<input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
												<span></span>
											</label>

											</div>
											@if (Route::has('admincp.forgetPassword'))
												<div class="col m--align-right">
													<a href="{{ route('admincp.forgetPassword') }}" class="m-link">Forget Password ?</a>
												</div>
											@endif

										</div>
										<div class="m-login__form-action">
											<button id="" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" 
				style="background-image: url({{Request::root()}}/admin/app/media/img//bg/bg-4.jpg)">
					<div class="m-grid__item">
						<h3 class="m-login__welcome">Join Our Community</h3>
						<p class="m-login__msg">
						</p>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

@endsection