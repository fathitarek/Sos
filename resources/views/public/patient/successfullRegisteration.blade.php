@include('public.layouts.header')
	<div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12 success-menu-background">
			<div class="container-fluid">
				<div class="row">
					<p class="success bold">{{ trans('words.you_have_been') }}</p>
				</div>
				<div class="row">
					<p class="success-success ">{{ trans('words.successfuly') }}</p>
				</div>
				<div class="row">
					<p class="success bold">{{ trans('words.registered') }}</p>
				</div>
			</div>
		</div>
	</div>
@include('public.layouts.footer')
