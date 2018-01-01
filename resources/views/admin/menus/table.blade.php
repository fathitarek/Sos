<table class="table table-responsive">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Display Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    @if(count($records))
    @foreach($records as $record)
    <tr>
        <td>{{$record->id}}</td>
        <td>{{$record->name}}</td>
        <td>{{$record->display_name}}</td>
        <td>{{$record->description}}</td>
        <td>
            <a href="{{ url('admin/menus/'.$record->id.'/edit/') }}" class="btn btn-primary from-control">Edit</a>
        </td>
        <td>
            {!! Form::open(array('class' =>'delete_form','method' => 'DELETE','action'=>array('MenuController@destroy',$record->id))) !!}
            {!! Form::hidden('id', $record->id) !!}
            {!! Form::submit('Delete',['class'=> 'btn btn-danger','onclick'=>'return ConfirmDelete()']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    @endif
</table>
