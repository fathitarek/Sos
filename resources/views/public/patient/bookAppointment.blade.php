@include('public.layouts.header')
<div class="container">
    <div class="col-md-5 col-sm-7 col-xs-10 menu-carousel-background">
        <p class="request-book">{{trans('words.book_visit')}}</p>
        <p class="request-now bold">{{trans('words.now')}}</p>

        <form action="post">
            <div id="patient-carousel" class="carousel slide" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#patient-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#patient-carousel" data-slide-to="1"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">

                        <div class="row person">
                            <div class="col-md-4 col-xs-4">
                                <p>{{trans('words.patient_is')}}</p>
                            </div>
                            <div class="col-md-4 col-xs-3">
                                <input type="radio" id="myself" name="patient" value="myself" required="1"> 
                                <label for="myself" class="radio-label">{{trans('words.myself')}}</label>
                            </div>
                            <div class="col-md-4 col-xs-5">
                                <input type="radio" id="someone-else" name="patient" value="someone-else" required="1"> 
                                <label for="someone-else" class="radio-label">{{trans('words.some_one_else')}}</label>
                            </div>
                        </div>


                        <div class="row">
                            <input type="text" placeholder="{{trans('words.his_her_name')}}" required="1">
                        </div>

                        <div class="row">
                            <select id="relation" name="relation" required="1">
                                <option value="0" selected="selected">{{trans('words.relation')}}</option>
                                <option value="1">brother</option>
                                <option value="2">mother</option>
                            </select>
                        </div>

                        <div class="row"> 
                            <select id="speciality" name="speciality" required="1">
                                <option value="0" selected="selected">{{trans('words.his_her_speciality')}}</option>
                                <option value="1">Speciality</option>
                                <option value="2">Speciality</option>
                            </select>
                        </div>
                        <div class="row next-button">
                            <a href="#patient-carousel" data-slide="next">{{trans('words.next')}}</a>

                        </div>
                    </div>

                    <div class="item">
                        <div class="row">
                            <select id="visit-place" name="visit-place" required="1">
                                <option value="0" selected="selected">{{trans('words.where_to_visit')}}</option>
                                <option value="1">Maadi</option>
                                <option value="2">Dokki</option>
                            </select>
                        </div>
                        <div class="row">
                            <textarea class="brief" placeholder="{{trans('words.problem_in_brief')}}"></textarea>
                        </div>
                        <div class="row">
                            <p class="payment-method">{{trans('words.payment_method')}}</p>
                        </div>
                        <div class="row person">
                            <div class="col-md-4 col-xs-3">
                                <input type="radio" id="cash" name="payment" value="cash" required="1"> 
                                <label for="cash" class="radio-label">{{trans('words.cash')}}</label>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <input type="radio" id="credit" name="payment" value="credit" required="1"> 
                                <label for="credit" class="radio-label">{{trans('words.credit')}}</label>
                            </div>
                            <div class="col-md-4 col-xs-5">
                                <input type="radio" id="insurance" name="payment" value="insurance" required="1"> 
                                <label for="insurance" class="radio-label">{{trans('words.insurance')}}</label>
                            </div>
                        </div>
                        <div class="row next-button">
                            <a href="#patient-carousel" data-slide="prev">{{ trans('words.prev') }}</a>
                            <input type="submit" value="{{trans('words.book')}} {{trans('words.now')}}!" class="submit">

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@include('public.layouts.footer')
