<!-- Name Field -->
<div class="form-group col-sm-8">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Assign Company -->

@if(Auth::user()->role->role == "Super User" || Auth::user()->role->role == "HR Manger" )
<div class="form-group col-sm-8">
    <label for="role">Assign Patient To Company</label>
    <select name="company">
    <option disabled selected value> -- select Company  -- </option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-8">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('patients.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
