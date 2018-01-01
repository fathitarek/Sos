@include('public.layouts.header')

<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-7 col-xs-8  rate-visit-menu-background">
            <p class="rate-visit-title">{{trans('words.rate_last_visit')}}</p>

            <form action="post">
                <div class="row doctor-section">
                    <div class="col-md-3 col-xs-4">
                        <div class="row">
                            <div class="doctor-pic-container">
                                <img src="/front/img/doctor-pic.png" alt="doctor picture" class="doctor-pic">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-xs-8 doctor-information">
                        <div class="row">
                            <div class="doctor-name">
                                <p>Ali Mohamed</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="doctor-title">
                                <p>General Practitioner</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="doctor-visit-date">
                                <p>Sunday 11/10-10 pm</p>
                            </div>
                        </div>
                    </div>
                </div>	
                
                <ul class="rating-list">
                    <li><i class="fa fa-star yellow"></i></li>
                    <li><i class="fa fa-star yellow"></i></li>
                    <li><i class="fa fa-star yellow"></i></li>
                    <li><i class="fa fa-star yellow"></i></li>
                    <li><i class="fa fa-star yellow"></i></li>
                </ul>


                <div class="row visit-comment-section">
                    <textarea class="visit-comment" name="comment" placeholder="{{trans('words.add_comment')}}"></textarea>
                </div>
                <div class="row submit-mobile-section">
                    <div class="row cancel-button">
                        <input type="submit" value="{{trans('words.submit')}}" name="comment" class="submit">
                    </div>	
                </div>
            </form>
        </div>
    </div>
</div>

@include('public.layouts.footer')
