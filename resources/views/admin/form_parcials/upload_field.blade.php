<div class="form-group">
    {!!Form::label($name,$label)!!}
    {!!Form::file($name) !!}
</div>
@if ($errors->has($name))
  <div class="error">
    <i class="fa fa-times-circle"></i>
    {{ $errors->first($name) }}
  </div>
@endif
