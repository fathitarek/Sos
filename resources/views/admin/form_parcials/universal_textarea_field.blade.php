<div class="form-group">
    {!!Form::label($name,$label)!!}
    {!!Form::textarea($name,null,['class'=> 'form-control']) !!}
</div>
@if ($errors->has($name))
    <div class="error">
      <i class="fa fa-times-circle"></i>
      {{ $errors->first($name) }}
    </div>
@endif
