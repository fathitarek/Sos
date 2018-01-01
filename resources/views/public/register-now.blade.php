@include('public.layouts.header')
<div>
	<div class="container">
		<div class="col-md-5 col-sm-4 col-xs-6 menu-background">

			<p class="register-now bold">{{ trans('words.register_now') }}!</p>
			<button class="btn btn-block login-btn"><a href="{{ route('doctor.register') }}">{{trans('words.ask_doctor')}}</a></button>
			<button class="btn btn-block register-btn"><a href="#">{{ trans('words.ask_patient') }}</a></button>
		</div>
	</div>
</div>
@include('public.layouts.footer')
