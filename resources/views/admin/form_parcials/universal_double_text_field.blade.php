<div class="form-group">
    {!!Form::label($label)!!}
    <fieldset class="form-inline">
        {!!Form::label($name_1,$label_1,['class'=>'control-label'])!!}
        {!!Form::text($name_1,null,['class'=> 'form-control']) !!}
        {!!Form::label($name_2,$label_2)!!}
        {!!Form::text($name_2,null,['class'=> 'form-control']) !!}
    </fieldset>

</div>