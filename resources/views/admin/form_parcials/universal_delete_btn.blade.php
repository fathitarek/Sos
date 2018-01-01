<script>

function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }
</script>


{!! Form::open(['method'=>'DELETE','action' =>[$action,$record->id]]) !!}
    {!! Form::submit('Delete',['class'=> 'btn btn-danger','onclick'=>'return ConfirmDelete()']) !!}
{!!Form::close()!!}
<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Waly
 * Date: 1/24/2016
 * Time: 5:17 PM
 */ 