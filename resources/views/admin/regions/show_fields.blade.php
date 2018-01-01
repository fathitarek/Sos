<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $region->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $region->name !!}</p>
</div>

<!-- Display Name En Field -->
<div class="form-group">
    {!! Form::label('display_name_en', 'Display Name En:') !!}
    <p>{!! $region->display_name_en !!}</p>
</div>

<!-- Display Name Ar Field -->
<div class="form-group">
    {!! Form::label('display_name_ar', 'Display Name Ar:') !!}
    <p>{!! $region->display_name_ar !!}</p>
</div>

<!-- City Id Field -->
<div class="form-group">
    {!! Form::label('city_id', 'City:') !!}
    <p>{!! $region->city->display_name_en !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $region->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $region->updated_at !!}</p>
</div>

