<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Email -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Display password -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<!--Display Confirm password -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
</div>


<!-- Assign Role -->
<div class="form-group col-sm-6">
    <label for="role">Assign Role</label>
    <select name="role_id">
    <option disabled selected value> -- select Assigned Role  -- </option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}"
            @if( isset($user)  && $user->role_id)
                {{ $user->role_id == $role->id ? 'selected' : '' }}
            @endif
            > {{ $role->role }}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
