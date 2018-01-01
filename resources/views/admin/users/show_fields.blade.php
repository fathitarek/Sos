<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Display Role -->
<div class="form-group">
    {!! Form::label('role', 'Role:') !!}
    <p>{!! $user->role->role !!}</p>
</div>

<!-- Display Routes -->
<div class="form-group">
    {!! Form::label('routes', 'Routes Can Be Accessed:') !!}
    <div class="row">
        @foreach($user->role->routes as $route)
            <div class="col-sm-3">
                {{ $route->route }}
            </div> 
        @endforeach   
    </div>    
</div>

