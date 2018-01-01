<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $city->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $city->name !!}</p>
</div>

<!-- Display Name En Field -->
<div class="form-group">
    {!! Form::label('display_name_en', 'Display Name En:') !!}
    <p>{!! $city->display_name_en !!}</p>
</div>

<!-- Display Name Ar Field -->
<div class="form-group">
    {!! Form::label('display_name_ar', 'Display Name Ar:') !!}
    <p>{!! $city->display_name_ar !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $city->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $city->updated_at !!}</p>
</div>

