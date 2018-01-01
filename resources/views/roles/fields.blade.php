<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::text('role', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    {!!Form::file('logo', ['class' => 'form-control']) !!}

</div>
<div class="form-group col-sm-12">
    <label>Add Roles:</label>
    <div class="form-check">
        @foreach($routes as $route) 
            @if(!is_null($route))
                <div class="col-sm-3">
                    <input class="form-check-input" type="checkbox" name="role_route[]" value="{{ $route }}"> 
                    <label class="form-check-label">
                        {{ $route }}
                    </label>
                </div>
            @endif
        @endforeach
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
