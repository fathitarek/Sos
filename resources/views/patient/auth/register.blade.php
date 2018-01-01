@include('public.layouts.header')

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 patient-menu-background">
        <div class="container-fluid">
            <div class="row">
                <p class="register-patient">{{trans('words.register_now')}}</p>
            </div>
            <div class="row">
                <form class="patient-form" role="form" method="POST" action="{{ url('/patient/login') }}">
                    {{ csrf_field() }}

                    <div class="col-sm-6 col-xs-6 first-col">

                        <div class="row">
                            <input type="text" placeholder="{{trans('words.full_name')}}" name="name" required="1">
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-6 no-padding">
                                <input type="radio" id="male" name="gender" value="male" required="1"> 
                                <label for="male " class="radio-label">{{trans('words.male')}}</label>
                            </div>
                            <div class="col-sm-6 col-xs-6 no-padding">
                                <input type="radio" id="female" name="gender" value="female" required="1">  
                                <label for="female" class="radio-label">{{trans('words.female')}}</label>
                            </div>

                        </div>

                        <div class="row">
                            <input id="email" type="email"  placeholder="{{trans('words.email')}}" name="email" value="{{ old('email') }}" autofocus>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="row">
                            <input type="password" name="password" placeholder="{{trans('words.password')}}" required="1">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <input type="password" placeholder="{{trans('words.confirm_password')}}" name="password_confirmation" required="1">
                        </div>

                    </div>

                    <!--                    <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember"> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>-->

                    <div class="col-sm-6 col-xs-6 second-col">
                        <div class="row">
                            <select id="city" name="city" required="1" onchange="document.getElementById('region').disabled = false;">
                                <option selected="selected">{{trans('words.city')}}
                                    <img src="img/arrow-down.png" alt="arrow-down"/>
                                </option>
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}" onchange="">
                                    @if(app()->getlocale() == 'ar')
                                        {{ $city->display_name_ar }}
                                     @else
                                        {{ $city->display_name_en }}
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <select id="region" name="region" required="1" disabled="1">
                                
                                <option selected="selected">{{trans('words.area')}}
                                <img src="img/arrow-down.png" alt="arrow-down" /></option>
                                @foreach($regions as $region)
                                <option value="{{ $region->id }}">
                                    @if(app()->getlocale() == 'ar')
                                        {{ $region->display_name_ar }}
                                     @else
                                        {{ $region->display_name_en }}
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <input type="text" placeholder="{{trans('words.address')}}" name="address" required="1">
                        </div>
                        <div class="row">
                            <p class="add-address"><i class="fa fa-plus" aria-hidden="true"></i>{{trans('words.more_address')}}</p>
                        </div>
                        <div class="row">
                            <input type="text" class="hidden-address" placeholder="{{trans('words.another_address')}}">
                        </div>
                        <div class="row">
                            <input type="submit" value="{{trans('words.submit')}}" class="submit">
                        </div>
<!--                            <a class="btn btn-link" href="{{ url('/patient/password/reset') }}">
                                Forgot Your Password?
                            </a>-->

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('public.layouts.footer')
