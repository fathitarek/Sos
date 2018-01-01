<!-- Route Field -->
<div class="form-group col-sm-6">
    {!! Form::label('route', 'Route:') !!}
    {!! Form::text('route', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role:') !!}
   {{ Form::select('role_id',$role,null,['placeholder' => 'Select Role...','class'=> '','id'=>'role_id'],['option'=>'Please Select Role']) }}

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('routes.index') !!}" class="btn btn-default">Cancel</a>
</div>
