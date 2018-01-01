<div class="form-group">
    {!!Form::label('menu_id','Menu: ')!!}
    {!!Form::select('menu_id',[null=>'Please Select Menu']+$menus,null,['class'=> 'form-control']) !!}
</div>