<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_en', 'Name En:') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_ar', 'Name Ar:') !!}
    {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!!Form::label('approved','approved: ')!!}
    @if(isset($specialty) && $specialty->approved==1)
 
    {!!Form::checkbox('approved',null,true) !!}
    @else
    {!!Form::checkbox('approved',null,false) !!}
    @endif
    
</div>
<div class="form-group col-sm-6">
    {!!Form::label('published','published: ')!!}
    @if(isset($specialty) && $specialty->published==1)
   
    {!!Form::checkbox('published',null,true) !!}
    @else
    {!!Form::checkbox('published',null,false) !!}
    @endif
    
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('specialties.index') !!}" class="btn btn-default">Cancel</a>
</div>
