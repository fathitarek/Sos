<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $visit->id !!}</p>
</div>

<!-- Patient Id Field -->
<div class="form-group">
    {!! Form::label('patient_id', 'Patient Id:') !!}
    <p>{!! $visit->patient_id !!}</p>
</div>

<!-- Doctor Id Field -->
<div class="form-group">
    {!! Form::label('doctor_id', 'Doctor Id:') !!}
    <p>{!! $visit->doctor_id !!}</p>
</div>

<!-- Start Time Field -->
<div class="form-group">
    {!! Form::label('start_time', 'Start Time:') !!}
    <p>{!! $visit->start_time !!}</p>
</div>

<!-- End Time Field -->
<div class="form-group">
    {!! Form::label('end_time', 'End Time:') !!}
    <p>{!! $visit->end_time !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $visit->status !!}</p>
</div>

<!-- Charage Field -->
<div class="form-group">
    {!! Form::label('charage', 'Charage:') !!}
    <p>{!! $visit->charage !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $visit->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $visit->updated_at !!}</p>
</div>

