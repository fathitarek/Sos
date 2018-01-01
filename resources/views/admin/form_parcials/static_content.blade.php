<div class="form-group">
    {!!Form::label('static_content','Use Static Content: ')!!}
    {!!Form::checkbox('static_content',null,false) !!}
</div>

<script>
    $("[name='static_content']").bootstrapSwitch('state');
</script>