<div class="form-group">
    {!!Form::label('featured','Featured on Home Page: ')!!}
    {!!Form::checkbox('featured',null,false) !!}
</div>

<script>
    $("[name='featured']").bootstrapSwitch('state');


function check() {
    alert (document.getElementById('featured').checked);
}
</script>