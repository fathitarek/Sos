<div class="form-group">
    {!!Form::label('override_global_title','Override Website Global Title: ')!!}
    {!!Form::checkbox('override_global_title',null,false) !!}
</div>

<script>
    $("[name='override_global_title']").bootstrapSwitch('state');


function check() {
    alert (document.getElementById('override_global_title').checked);
}
</script>