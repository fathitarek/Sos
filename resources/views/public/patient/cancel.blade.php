@include('public.layouts.header')


<div class="container">
    <div class="col-md-5 col-sm-7 col-xs-10 cancel-menu-background">
        <form action="post">
            <div class="row cancel-sosed">
                <p class="cancel-sosed-question">{{trans('words.are_you_sure_that')}}<br>{{trans('words.want_to_cancel')}}
                    <br> {{trans('words.visit')}}</p>
            </div>
            <div class="row">
                <p class="cancel-fees">{{trans('words.fee_may_be_applied')}}</p>
            </div>
            <div class="row form-buttons">
                <div class="col-md-6 col-xs-6">
                    <div class="row ">
                        <input type="submit" value="{{trans('words.yes')}}" class="cancel">
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="row cancel-button">
                        <input type="submit" value="{{trans('words.no')}}" class="cancel">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('public.layouts.footer')
