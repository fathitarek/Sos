@include('public.layouts.header')

<div>
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 doctor-menu-background">
            <div class="container-fluid">
                <div class="row">
                    <p class="register-doctor">{{ trans('words.register_now') }}</p>
                    @if (isset($message))
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <form method="post" class="doctor-form" action="{{ url('/doctor/register') }}" enctype="multipart/form-data">
                        <div class="col-sm-6 col-xs-6 first-col">
                            {{ csrf_field() }}
                            <input type="hidden" name="remember_token" value="<?php echo md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)); ?>">
                            <div class="row">
                                <input type="text" placeholder="{{ trans('words.full_name')}}" name="name" value="{{ old('name') }}" autofocus  required="1">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <input type="radio" id="male" name="gender" value="1" required="1">
                                    <label for="male " class="radio-label">{{trans('words.male')}}</label>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <input type="radio" id="female" name="gender" value="2" required="1">  <label for="female" class="radio-label">{{trans('words.female')}}</label>
                                </div>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="row">
                                <input type="text" placeholder="{{trans('words.address')}}" name="address" value="{{ old('address') }}" autofocus  required="1">
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="text" placeholder="{{trans('words.mobile_number')}}"  name="mobile" value="{{ old('mobile') }}" autofocus required="1">
                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="email"  name="email" value="{{ old('email') }}" placeholder="{{trans('words.email')}}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="password" id="password" placeholder="{{trans('words.password')}}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="password"  id="password-confirm" name="password_confirmation" required  placeholder="{{trans('words.confirm_password')}}">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="number" placeholder="{{trans('words.national_id')}}" name="national_id" value="{{ old('national_id') }}" autofocus required>
                                @if ($errors->has('national_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('national_id') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>


                        <div class="col-sm-6 col-xs-6 second-col">
                            <div class="row">
                                {{ Form::select('specialty_id',$specialty,null,['placeholder' => trans('words.specialty'),'class'=> '','id'=>'specialty_id'],['option'=>'Selct Speciality']) }}
                            </div>
                            <div class="row">
                                <input type="text" placeholder="{{trans('words.register_no_medical_syndicate')}}" name="medical_syndicate" value="{{ old('medical_syndicate') }}" autofocus required>
                                @if ($errors->has('medical_syndicate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('medical_syndicate') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="date" placeholder="{{trans('words.register_date_medical_syndicate')}}" name="date_medical_syndicate_id" value="{{ old('date_medical_syndicate_id') }}" autofocus required>
                                @if ($errors->has('date_medical_syndicate_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_medical_syndicate_id') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="row">
                                <input type="number" placeholder="{{trans('words.licence_no_with_health')}}" name="license_ministry_health_id" value="{{ old('license_ministry_health_id') }}" autofocus required>
                                @if ($errors->has('license_ministry_health_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('license_ministry_health_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <button id="popup"  class="credit-details">{{trans('words.credit_card_details')}}</button>
                            </div>
                            <!-- Popup Div Starts Here -->
                            <div id="abc">
                                <div id="popupContact">
                                <img src="/front/img/close.png" id="close1" class="close-img">
                                    <!-- <div class="credit-card"> -->

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4 col-md-offset-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <h3 class="text-center">{{trans('words.credit_card_details')}}</h3>
                                                            <input type='radio' class="visa" name='card_type' value='1' id="visa"/><label for="visa"></label>
                                                            <input type='radio' class="master" name='card_type' value='2' id="master"/><label for="master"></label>
                                                            <!-- <img class=" cc-img img-responsive" src="img/visa.png">
                                                            <img class=" cc-img img-responsive" src="img/master.png"> -->
                                                            @if ($errors->has('card_type'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('card_type') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="credit-form">

                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>{{trans('words.card_number')}}</label>
                                                                        <div class="input-group">
                                                                            <input type="number" class="form-control"  name="card_number" value="{{ old('card_number') }}" autofocus required placeholder="{{trans('words.valid_card')}}" />
                                                                            <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-7 col-md-7">
                                                                    <div class="form-group">
                                                                        <label><span class="hidden-xs">{{trans('words.expiration')}}</span><span class="visible-xs-inline">{{trans('words.exp')}}</span>{{trans('words.date')}}</label>
                                                                        <input type="date" class="form-control" placeholder="MM / YY" name="number_expiry_date" value="{{ old('number_expiry_date') }}" autofocus required/>
                                                                        @if ($errors->has('number_expiry_date'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('number_expiry_date') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-5 col-md-5 pull-right">
                                                                    <div class="form-group">
                                                                        <label>CV CODE</label>
                                                                        <input type="number" class="form-control" placeholder="CVC" name="ccv" value="{{ old('ccv') }}" autofocus required/>
                                                                        @if ($errors->has('ccv'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('ccv') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>{{trans('words.card_owner')}}</label>
                                                                        <input type="text" class="form-control" placeholder="{{trans('words.card_owner_name')}}" name="card_name" value="{{ old('card_name') }}" autofocus required/>
                                                                        @if ($errors->has('card_name'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('card_name') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="panel-footer">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <button  id="abc-hide" class="btn btn-warning btn-lg btn-block">{{trans('words.save')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- </div> -->

                                </div>
                            </div>
                            <!-- Popup Div Ends Here -->
                            <div class="row">
                                <input type="button" id="browse" placeholder="upload files" value= "{{trans('words.upload_file')}}"  class="browse">
                            </div>
                            <div id="xyz">
                                <div id="popupContact">
                                <img src="/front/img/close.png" id="close2" class="close-img">
                                    <!-- <div class="credit-card"> -->

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-5 col-md-offset-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <h3 class="text-center">{{trans('words.upload_following_file')}}</h3>

<!-- <img class=" cc-img img-responsive" src="img/visa.png">
<img class=" cc-img img-responsive" src="img/master.png"> -->

                                                        </div>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="credit-form">
                                                            <!--name="image_national_id" value="{{ old('image_national_id') }}" autofocus required-->
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>{{trans('words.personal_photo_coat')}}</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="personal_photo" value="{{ old('personal_photo') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>{{trans('words.front_medical_syndicate')}}</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="front_medical_syndicate" value="{{ old('front_medical_syndicate') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>{{trans('words.back_medical_syndicate')}}</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="back_medical_syndicate" value="{{ old('back_medical_syndicate') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>{{trans('words.front_national_id')}}</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="image_national_id" value="{{ old('image_national_id') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>{{trans('words.back_national_id')}}</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="back_national_id" value="{{ old('back_national_id') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>

                                                    <div class="panel-footer">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <button id="hide-browse" class="btn btn-warning btn-lg btn-block">{{trans('words.save')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- </div> -->

                                </div>
                            </div>
                            <!-- Popup Div Ends Here -->
                            <div class="row upload-info">
                                <h4>- {{trans('words.personal_photo_coat')}}</h4>
                                <h4>- {{trans('words.front_medical_syndicate')}}</h4>
                                <h4>- {{trans('words.back_medical_syndicate')}}</h4>
                            </div>

                            <div class="row ">
                                <div class="col-md-6 col-sm-8 col-xs-8 agree-check">
                                    <input type="checkbox" name="approved_terms" value="1" id="agree" class="agree" required="1"/><label for="agree">{{trans('words.read_agree')}}<a class="terms-link" id="terms-show">{{trans('words.terms_condition_title')}}</a></label>
                                    <!-- Popup Div Starts Here -->
                                    <div id="def">
                                        <div id="popupContact">
                                        <img src="/front/img/close.png" id="close" class="close-img">
                                            <div class="terms-window">

                                                <div class="form-header">
                                                    <h4 class="title">{{trans('words.terms_condition_title')}}</h4>
                                                </div>
                                                <div class="form-body">
                                                    <div class="form-descriptions">
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                        <p class="terms-points">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium, fugit magni veritatis eius deleniti quis voluptates fugiat consequuntur eveniet, sapiente tenetur ea odit nam.</p>
                                                    </div>





                                                    <button type="button" class="proceed-btn" id="def-hide"><a href="#" >{{trans('words.close')}}</a></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Popup Div Ends Here -->


                                </div>
  
                                <div class="col-md-6 col-sm-4 col-xs-4">
                                    <input type="submit" value="{{trans('words.submit')}}" class="submit">
                                </div>
                                 {{--  <button type="submit" class="submit">
                                    Submit
                                </button>  --}}


                            </div>

                        </div>

                    </form>


                </div>

            </div>


        </div>
    </div>
</div>

<script type="text/javascript" src="/front/js/index.js"></script>

@include('public.layouts.footer')
