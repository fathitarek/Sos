@include('public.layouts.header')

<div class="container">
    <div class="col-md-5 col-sm-7 col-xs-10 sosed-menu-background">
        <p class="sosed-title">{{ trans('words.you_have_successfully_sosed')}}<br> {{trans('words.sosed_doctor')}} </p>

        <form action="post">
            <div class="row doctor-section">
                <div class="col-md-3 col-xs-4">
                    <div class="row">
                        <div class="doctor-pic-container">
                            <img src="/front/img/doctor-pic.png" alt="doctor picture" class="doctor-pic">
                        </div>
                    </div>

                    <div class="row">
                        <div class="rate-section">
                            <img src="/front/img/star-rate.png" alt="star-rate" class="star-rate">
                            <p class="rate-no">4.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-xs-8 doctor-information">
                    <div class="row">
                        <div class="doctor-name">
                            <p>Dr. Abdallah Ahmed</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="doctor-title">
                            <p>General Practitioner</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="doctor-ETA">
                            <p>ETA: <span class="ETA">20 min.</span></p>
                        </div>
                    </div>
                </div>
            </div>	

            <div class="row sos-number-visits">
                <div class="col-md-6 col-xs-6 time-on-sos">
                    <div class="row">
                        <p class="time-sos">{{trans('words.time_on')}}<br>{{trans('words.sos')}}</p>
                    </div>
                    <div class="row">
                        <p class="sos-months">2 months</p>
                    </div>
                </div>

                <div class="col-md-6 col-xs-6 number-of-visits">
                    <div class="row">
                        <p class="number-visits">{{trans('words.number_of')}}<br>{{trans('words.visits')}}</p>
                    </div>
                    <div class="row">
                        <p class="sos-visits">30 {{trans('words.visits')}}</p>
                    </div>
                </div>
            </div>	
            <div class="row submit-mobile-section">
                <div class="col-md-3 col-xs-3">
                    <div class="row mobile-icon">
                        <img src="/front/img/mobile-icon.png"  alt="mobile-icon">
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div class="row">
                        <img src="/front/img/message-icon.png" class="message-icon" alt="message-icon">
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="row cancel-button">
                        <input type="submit" value="{{trans('words.cancel')}}" class="cancel">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@include('public.layouts.footer')
