@extends('layouts.app')
<style>
    .uploaded-img{
        margin: 10px 0px 10px;
        width: 90px;
        height: 90px;  
    }
    .drop-down-specialty-select{

        width: 100%;
    }

    .updateButton {
        margin-top: 7px;
    }

    .checkBoxs  ul {
        list-style: none;
        margin-left: 30%;
    }

    .checkBoxs ul li {
        float :left;
        margin-left: 2px;
    }

    .extra-MarginB {
        margin-bottom: 33px;
    }

</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update info dr. <b>{{ $data->name}}</b></div>
                <div class="panel-body">
                    {!!Form::model($data,['method' =>'PATCH', 'action'=>['DoctorController@update',$data->id],'files' => true])!!}      
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" value="{{$data->name}}" name="name" value="{{ old('name') }}" autofocus required>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="col-md-4 control-label">gender</label>

                        <div class="col-md-6">


<!--<input id="gender" type="text" class="form-control" name="gender" value="{{ old('gender') }}" autofocus>-->
                            @if($data->gender==1)
                            <input type="radio" name="gender" value="1" checked> Male<br>
                            <input type="radio" name="gender" value="2" > Female<br>
                            @else
                            <input type="radio" name="gender" value="1"> Male<br>

                            <input type="radio" name="gender" value="2" checked> Female<br>

                            @endif
<!--                              <input type="radio" name="gender" value="1"> Male<br>
                        <input type="radio" name="gender" value="2"> Female<br>-->
                            @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">address</label>


                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{$data->address}}" autofocus required>

                            @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>




                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                        <label for="mobile" class="col-md-4 control-label">mobile</label>

                        <div class="col-md-6">
                            <input id="mobile" type="number" class="form-control" name="mobile" value="{{$data->mobile}}" autofocus required>

                            @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('card_type') ? ' has-error' : '' }}">
                        <label for="card_type" class="col-md-4 control-label">card_type</label>

                        <div class="col-md-6">
<!--                                <input id="card_type" type="text" class="form-control" name="card_type" value="{{ old('card_type') }}" autofocus>-->
<!--                            <input type="radio" name="card_type" value="1"> Visa<br>
                        <input type="radio" name="card_type" value="2"> Master Card<br>-->
                            @if($data->card_type==1)
                            <input type="radio" name="card_type" value="1" checked> Visa<br>
                            <input type="radio" name="card_type" value="2"> Master Card<br>
                            @else
                            <input type="radio" name="card_type" value="1"> Visa<br>

                            <input type="radio" name="card_type" value="2" checked> Master Card<br>

                            @endif



                            @if ($errors->has('card_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card_type') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('card_name') ? ' has-error' : '' }}">
                        <label for="card_name" class="col-md-4 control-label">card_name</label>

                        <div class="col-md-6">
                            <input id="card_name" type="text" class="form-control" name="card_name" value="{{$data->card_name}}" autofocus required>

                            @if ($errors->has('card_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('number_expiry_date') ? ' has-error' : '' }}">
                        <label for="number_expiry_date" class="col-md-4 control-label">number_expiry_date</label>

                        <div class="col-md-6">
                            <input id="card_name" type="date" class="form-control" name="number_expiry_date" value="{{$data->number_expiry_date}}" autofocus required>

                            @if ($errors->has('number_expiry_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number_expiry_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('medical_syndicate') ? ' has-error' : '' }}">
                        <label for="medical_syndicate" class="col-md-4 control-label">medical_syndicate</label>

                        <div class="col-md-6">
                            <input id="card_name" type="text" class="form-control" name="medical_syndicate" value="{{$data->medical_syndicate}}" autofocus required>

                            @if ($errors->has('medical_syndicate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('medical_syndicate') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('date_medical_syndicate_id') ? ' has-error' : '' }}">
                        <label for="date_medical_syndicate_id" class="col-md-4 control-label">date_medical_syndicate_id</label>

                        <div class="col-md-6">
                            <input id="date_medical_syndicate_id" type="date" class="form-control" name="date_medical_syndicate_id" value="{{$data->date_medical_syndicate_id}}" autofocus required>

                            @if ($errors->has('date_medical_syndicate_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_medical_syndicate_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('license_ministry_health_id') ? ' has-error' : '' }}">
                        <label for="license_ministry_health_id" class="col-md-4 control-label">license_ministry_health_id</label>

                        <div class="col-md-6">
                            <input id="license_ministry_health_id" type="number" class="form-control" name="license_ministry_health_id"  value="{{$data->license_ministry_health_id}}" autofocus required>

                            @if ($errors->has('license_ministry_health_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('license_ministry_health_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('ccv') ? ' has-error' : '' }}">
                        <label for="ccv" class="col-md-4 control-label">ccv</label>

                        <div class="col-md-6">
                            <input id="ccv" type="number" class="form-control" name="ccv" value="{{$data->ccv}}" autofocus required>

                            @if ($errors->has('ccv'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ccv') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('national_id') ? ' has-error' : '' }}">
                        <label for="national_id" class="col-md-4 control-label">national_id</label>

                        <div class="col-md-6">
                            <input id="national_id" type="number" class="form-control" name="national_id" value="{{$data->national_id}}" autofocus required>

                            @if ($errors->has('national_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('national_id') }}</strong>
                            </span>
                            @endif
                            {!!$data->image_national_id ? '<img src="/upload/'.$data->image_national_id.'" class="uploaded-img"/>':''!!}

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('back_national_id') ? ' has-error' : '' }}">

                        <label for="back_national_id" class="col-md-4 control-label">back_national_id</label>

                        <div class="col-md-6">
                            <input id="back_national_id" type="file" class="form-control" name="back_national_id" value="{{ old('back_national_id') }}" autofocus>

                            @if ($errors->has('back_national_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('back_national_id') }}</strong>
                            </span>
                            @endif

                            {!!$data->back_national_id ? '<img src="/upload/'.$data->back_national_id.'" class="uploaded-img"/>':''!!}

                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('front_medical_syndicate') ? ' has-error' : '' }}">

                        <label for="front_medical_syndicate" class="col-md-4 control-label">front_medical_syndicate</label>

                        <div class="col-md-6">
                            <input id="front_medical_syndicate" type="file" class="form-control" name="front_medical_syndicate" value="{{ old('front_medical_syndicate') }}" autofocus>

                            @if ($errors->has('front_medical_syndicate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('front_medical_syndicate') }}</strong>
                            </span>
                            @endif
                            {!!$data->front_medical_syndicate ? '<img src="/upload/'.$data->front_medical_syndicate.'" class="uploaded-img"/>':''!!}

                        </div>


                    </div>




                    <div class="form-group{{ $errors->has('back_medical_syndicate') ? ' has-error' : '' }}">

                        <label for="back_medical_syndicate" class="col-md-4 control-label">back_medical_syndicate</label>

                        <div class="col-md-6">
                            <input id="back_medical_syndicate" type="file" class="form-control" name="back_medical_syndicate" value="{{ old('back_medical_syndicate') }}" autofocus>

                            @if ($errors->has('back_medical_syndicate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('back_medical_syndicate') }}</strong>
                            </span>
                            @endif
                            {!!$data->back_medical_syndicate ? '<img src="/upload/'.$data->back_medical_syndicate.'" class="uploaded-img" />':''!!}

                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('personal_photo') ? ' has-error' : '' }}">

                        <label for="personal_photo" class="col-md-4 control-label">personal_photo</label>

                        <div class="col-md-6">
                            <input id="back_medical_syndicate" type="file" class="form-control" name="personal_photo" value="{{ old('personal_photo') }}" autofocus>

                            @if ($errors->has('personal_photo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('personal_photo') }}</strong>
                            </span>
                            @endif
                            {!!$data->personal_photo ? '<img src="/upload/'.$data->personal_photo.'" class="uploaded-img"/>':''!!}

                        </div>
                    </div>








                    <div class="form-group{{ $errors->has('specialty_id') ? ' has-error' : '' }}">
                        <label for="specialty_id" class="col-md-4 control-label">specialty_id</label>

                        <div class="col-md-6 ">
                            {{ Form::select('specialty_id',$specialty,null,['placeholder' => 'Select Specialty','class'=> 'drop-down-specialty-select','id'=>'specialty_id'],['option'=>'Please Select specialty'])  }}

                            @if ($errors->has('specialty _id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('specialty_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-2 extra-MarginB"></div>
                    </div>



<!--                        <input type="hidden" name="active" value="0">
                        <input type="hidden" name="approved" value="0">
                        <input type="hidden" name="verify" value="0">
                        <input type="hidden" name="rejected" value="0">
                        <input type="hidden" name="pending" value="0">
                    -->

                    <!--<input type="hidden" name="user_id" value="0">-->
                    <input type="hidden" name="remember_token" value="<?php echo md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)); ?>">


                    <div class="row checkBoxs">
                        <ul>
                            <li>

                                {!!Form::label('active','active: ')!!}
                                @if($data->active==1)
                                {!!Form::checkbox('active',null,true) !!}
                                @else
                                {!!Form::checkbox('active',null,false) !!}
                                @endif
                            </li>
                            <li>
                                {!!Form::label('approved','approved: ')!!}
                                @if($data->approved==1)
                                {!!Form::checkbox('approved',null,true) !!}
                                @else
                                {!!Form::checkbox('approved',null,false) !!}
                                @endif
                            </li>
                            <li>
                                {!!Form::label('verify','verify: ')!!}
                                @if($data->verify==1)
                                {!!Form::checkbox('verify',null,true) !!}
                                @else
                                {!!Form::checkbox('verify',null,false) !!}
                                @endif
                            </li>

                            <li>
                                {!!Form::label('rejected','rejected: ')!!}
                                @if($data->rejected==1)
                                {!!Form::checkbox('rejected',null,true) !!}
                                @else
                                {!!Form::checkbox('rejected',null,false) !!}
                                @endif
                            </li>
                            <li>
                                {!!Form::label('pending','pending: ')!!}
                                @if($data->pending==1)
                                {!!Form::checkbox('pending',null,true) !!}
                                @else
                                {!!Form::checkbox('pending',null,false) !!}
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary updateButton">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
