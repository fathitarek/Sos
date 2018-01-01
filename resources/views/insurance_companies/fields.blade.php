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

{{--  @if($insuranceCompany->manger)
    <!-- Manger Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('manger', 'Manger:') !!}
        {!! Form::label('manger', $insuranceCompany->manger->name , ['class' => 'form-control']) !!}

        {!! Form::label('remove_manger', 'RemoveManger:') !!}
        {!! Form::checkbox('remove_manger',null,false) !!}
    </div>
@endif  --}}


<div class="form-group col-sm-6">
    {!!Form::label('approved','approved: ')!!}
    @if(isset($insuranceCompany) && $insuranceCompany->approved==1)
    

    {!!Form::checkbox('approved',null,true) !!}
    @else
    {!!Form::checkbox('approved',null,false) !!}
    @endif
    
</div>

<div class="form-group col-sm-6">
    {!!Form::label('published','published: ')!!}
    @if(isset($insuranceCompany) && $insuranceCompany->published==1)
 
    {!!Form::checkbox('published',null,true) !!}
    @else
    {!!Form::checkbox('published',null,false) !!}
    @endif
   
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('insuranceCompanies.index') !!}" class="btn btn-default">Cancel</a>
</div>
