<div class="form-group">
    {!!Form::label('menu_image','Menu Image: ')!!}
    {!!Form::checkbox('menu_image',null,false) !!}
</div>
<div id="image_upload" class="form-group collapse ">
    {!!Form::label('menuimagefile','Menu Image File: ')!!}
    {!!Form::file('menuimagefile') !!}
</div>
@if(! empty($record))
    {!!$record->menu_image ? '<img src="/menu_images/'.$record->menuimagefile.'" height="100"/>':''!!}
@endif


<script>
    $("[name='menu_image']").bootstrapSwitch('state');
$('input[name="menu_image"]').on('switchChange.bootstrapSwitch', function(event, state) {
    if(state){
        collapse('show');
    }else{
        collapse('hide')
    }
});

function collapse(_action){
$('#image_upload').collapse(_action);
}
window.onload = function() {
 if(document.getElementById('menu_image').checked){
  collapse('show');
 }
};
function check() {
    alert (document.getElementById('menu_image').checked);
}
</script>

