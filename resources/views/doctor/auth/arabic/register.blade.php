@include('public/ar/header')


<div>
    <img class="background-body" src="/front/img/body-bg.jpg" alt="background body">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 doctor-menu-background">
            <div class="container-fluid">
                <div class="row">
                    <p class="register-doctor">سجّل الآن</p>
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
                                <input type="text" placeholder="الإسم بالكامل" name="name" value="{{ old('name') }}" autofocus  required="1">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <input type="radio" id="male" name="gender" value="1" required="1">
                                    <label for="male " class="radio-label">ذكر</label>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <input type="radio" id="female" name="gender" value="2" required="1">  <label for="female" class="radio-label">أنثى</label>
                                </div>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="row">
                                <input type="text" placeholder="العنوان" name="address" value="{{ old('address') }}" autofocus  required="1">
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="text" placeholder="رقم المحمول"  name="mobile" value="{{ old('mobile') }}" autofocus required="1">
                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="email"  name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="password" id="password" placeholder="كلمة السر" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="password"  id="password-confirm" name="password_confirmation" required  placeholder="إعادة كلمة السر">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="number" placeholder="بطاقة الرقم القومي" name="national_id" value="{{ old('national_id') }}" autofocus required>
                                @if ($errors->has('national_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('national_id') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>


                        <div class="col-sm-6 col-xs-6 second-col">
                            <div class="row">
                                {{ Form::select('specialty_id',$specialty,null,['placeholder' => 'التخصص','class'=> '','id'=>'specialty_id']) }}
                            </div>
                            <div class="row">
                                <input type="text" placeholder="رقم تسجيل نقابة الأطباء" name="medical_syndicate" value="{{ old('medical_syndicate') }}" autofocus required>
                                @if ($errors->has('medical_syndicate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('medical_syndicate') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <input type="date" placeholder="تاريخ التسجيل بنقابة الأطباء" name="date_medical_syndicate_id" value="{{ old('date_medical_syndicate_id') }}" autofocus required>
                                @if ($errors->has('date_medical_syndicate_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_medical_syndicate_id') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="row">
                                <input type="number" placeholder="رقم الترخيص بوزارة الصحة" name="license_ministry_health_id" value="{{ old('license_ministry_health_id') }}" autofocus required>
                                @if ($errors->has('license_ministry_health_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('license_ministry_health_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <button id="popup"  class="credit-details">بيانات بطاقة الائتمان</button>
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
                                                            <h3 class="text-center">بيانات بطاقة الائتمان</h3>
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
                                                                        <label>رقم الكارت</label>
                                                                        <div class="input-group">
                                                                            <input type="number" class="form-control"  name="card_number" value="{{ old('card_number') }}" autofocus required placeholder="رقم كارت صحيح" />
                                                                            <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-7 col-md-7">
                                                                    <div class="form-group">
                                                                        <label><span class="hidden-xs">تاريخ الإنتهاء</span><span class="visible-xs-inline">الإنتهاء</span> تاريخ</label>
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
                                                                        <label>CVV كود</label>
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
                                                                        <label>صاحب الكارت</label>
                                                                        <input type="text" class="form-control" placeholder="اسم صحاب الكارت" name="card_name" value="{{ old('card_name') }}" autofocus required/>
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
                                                                <button  id="abc-hide" class="btn btn-warning btn-lg btn-block">حفظ</button>
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
                                <input type="button" id="browse" placeholder="تحميل الوثائق" value="تحميل الوثائق"  class="browse">
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
                                                            <h3 class="text-center">حمل الملفات الآتية</h3>

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
                                                                        <label>صورة شخصية بمعطف الطبيب الأبيض</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="personal_photo" value="{{ old('personal_photo') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>صورة الوجه الأمامي لبطاقة نقابة الأطباء</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="front_medical_syndicate" value="{{ old('front_medical_syndicate') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>صورة الوجه الخلفي لبطاقة نقابة الأطباء</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="back_medical_syndicate" value="{{ old('back_medical_syndicate') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>صورة الوجه الأمامي لبطاقة الرقم القومي</label>
                                                                        <div class="input-group">
                                                                            <input type="file" class="form-control" name="image_national_id" value="{{ old('image_national_id') }}" autofocus required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>صورة الوجه الأمامي لبطاقة الرقم القومي</label>
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
                                                                <button id="hide-browse" class="btn btn-warning btn-lg btn-block">حفظ</button>
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
                                <h4>- صورة شخصية بمعطف الطبيب الأبيض</h4>
                                <h4>- صورة وجهان لبطاقة نقابة الأطباء</h4>
                                <h4>- صورة وجهان لبطاقة الرقم القومي</h4>
                            </div>

                            <div class="row ">
                                <div class="col-md-6 agree-check">
                                    <input type="checkbox" name="approved_terms" value="1" id="agree" class="agree" required="1"/><label for="agree">لقد قرأت و وافقت علي<a class="terms-link" id="terms-show">الشروط و الأحكام و سياسات الخصوصية</a></label>
                                    <!-- Popup Div Starts Here -->
                                    <div id="def">
                                        <div id="popupContact">
                                        <img src="/front/img/close.png" id="close" class="close-img">
                                            <div class="terms-window">

                                                <div class="form-header">
                                                    <h4 class="title">الشروط و الأحكام و سياسات الخصوصية</h4>
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





                                                    <button type="button" class="proceed-btn" id="def-hide"><a href="#" >قفل</a></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Popup Div Ends Here -->


                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="تأكيد" class="submit">
                                 {{--  <button type="submit" class="submit">
                                    Submit
                                </button>  --}}

                                </div>

                            </div>

                        </div>

                    </form>


                </div>

            </div>


        </div>
    </div>
</div>

<script type="text/javascript" src="/front/js/index.js"></script>

@include('public/ar/footer')
