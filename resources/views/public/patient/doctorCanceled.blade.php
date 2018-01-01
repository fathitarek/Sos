@include('public.layouts.header')


<div class="container">
    <div class="col-md-5 col-sm-7 col-xs-10 cancel-doctor-menu-background">
        <form action="post">
            <div class="row cancel-doctor">
                <p>{{trans('words.doctor_had_to_cancel')}}.</p>
            </div>

            <div class="row cancel-sosing">
                <p>
                    {{trans('words.sosing_another')}}
                    
                    <br>
                    
                    {{trans('words.doctor')}}
                </p>
            </div>
            <div class="row form-buttons">
                <div class="col-md-12">
                    <div class="row ">
                        <input type="submit" value=" {{trans('words.cancel')}}" class="cancel">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('public.layouts.footer')
