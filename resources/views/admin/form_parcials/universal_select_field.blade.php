<div class="form-group">
    {!!Form::label($name,$label)!!}
    {!!Form::select($name,[null=>$default_option]+$list_items,null,['class'=> 'form-control']) !!}
</div>

@if ($errors->has($name))
    <div class="error">
        <i class="fa fa-times-circle"></i>
        {{ $errors->first($name) }}
    </div>
@endif