<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Region:') !!}
   {{ Form::select('region_id',$regions,null,['placeholder' => 'Select region...','class'=> '','id'=>'region_id'],['option'=>'Please Select Region']) }}
</div>

<!-- Patient Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient_id', 'Patient:') !!}
   {{ Form::select('patient_id',$patients,null,['placeholder' => 'Select patient...','class'=> '','id'=>'patient_id'],['option'=>'Please Select Patient']) }}
</div>
<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City:') !!}
   {{ Form::select('city_id',$city,null,['placeholder' => 'Select City...','class'=> '','id'=>'city_id'],['option'=>'Please Select City']) }}

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('locations.index') !!}" class="btn btn-default">Cancel</a>
</div>
