@include('public.layouts.header')


<div>
	<div class="container">
		<div class="col-md-5 col-sm-4 col-xs-6 menu-background">
			<p class="book">{{trans('words.book_visit')}}</p>
			<p class="now bold">{{trans('words.now')}}</p>
			<button class="btn btn-block login-btn"><a href="#">{{trans('words.login')}}</a></button>
			<button class="btn btn-block register-btn"><a href="{{route('doctor.register')}}">{{trans('words.register')}}</a></button>
		</div>
	</div>
</div>

@include('public.layouts.footer')
