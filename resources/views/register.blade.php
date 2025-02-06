@extends('layout.master')
@section('content')


<div class="container-fluid mt-4">
	<div class="container">
		<h2 class="display-4">
			Register </h2>

		<hr />

		<div id="alerts">
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
				<form method="post" action="{{ url('/registerSubmit') }}">
					@csrf
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="Username" pattern="[A-Za-z0-9_-]+" name="name"
							placeholder="Type username" required value="{{ old('name') }}" />
						@if ($errors->has('name'))
						<div class="text-danger">{{ $errors->first('name') }}</div>
						@endif
						<small class="form-text text-muted">Usernames must only include alphanumeric characters,
							underscores, or dashes.</small>
					</div>

					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email"
							placeholder="Type email address" required value="{{ old('email') }}" />
						@if ($errors->has('email'))
						<div class="text-danger">{{ $errors->first('email') }}</div>
						@endif
					</div>

					<div class="form-group">
						<label for="confirm-email">Confirm email address</label>
						<input type="email" class="form-control" id="confirm-email" name="confirm_email"
							placeholder="Type email address again" required value="{{ old('confirm_email') }}" />
						@if ($errors->has('confirm_email'))
						<div class="text-danger">{{ $errors->first('confirm_email') }}</div>
						@endif
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password"
							placeholder="Type password" required value="{{ old('password') }}" />
						@if ($errors->has('password'))
						<div class="text-danger">{{ $errors->first('password') }}</div>
						@endif
						<small class="form-text text-muted">Passwords must be 8 characters or longer and include both
							letters and numbers.</small>
					</div>

					<div class="form-group">
						<label for="confirm_password">Confirm Password</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password"
							placeholder="Confirm password" required value="{{ old('confirm_password') }}" />
						@if ($errors->has('confirm_password'))
						<div class="text-danger">{{ $errors->first('confirm_password') }}</div>
						@endif
					</div>

					<div class="form-group">
						<div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
					</div>
					@if ($errors->has('g-recaptcha-response'))
					<div class="text-danger">{{ $errors->first('g-recaptcha-response') }}</div>
					@endif

					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="Register" />
					</div>
				</form>
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>

			</div>
		</div>
	</div>
	@endsection