<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_name_en', 'Display Name En:') !!}
    {!! Form::text('display_name_en', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_name_ar', 'Display Name Ar:') !!}
    {!! Form::text('display_name_ar', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cities.index') !!}" class="btn btn-default">Cancel</a>
</div>
