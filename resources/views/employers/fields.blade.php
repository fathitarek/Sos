<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person', 'Contact Person:') !!}
    {!! Form::text('contact_person', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!!Form::label('approved','approved: ')!!}
    @if(isset($employer) && $employer->approved==1)
    

    {!!Form::checkbox('approved',null,true) !!}
    @else
    {!!Form::checkbox('approved',null,false) !!}
    @endif
    
</div>
<div class="form-group col-sm-6">
    {!!Form::label('published','published: ')!!}
    @if(isset($employer) && $employer->published==1)
 
    {!!Form::checkbox('published',null,true) !!}
    @else
    {!!Form::checkbox('published',null,false) !!}
    @endif
   
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employers.index') !!}" class="btn btn-default">Cancel</a>
</div>
