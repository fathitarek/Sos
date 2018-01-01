<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>personal image</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($patients as $patient)
        <tr>
            <td>{!! $patient->name !!}</td>
            <td>{!! $patient->address !!}</td>
            <td>{!! $patient->mobile !!}</td>
            <td><img src="{{public_path()}}/uploads/{!! $patient->mobile !!}" height="40" /></td>
            <td>
                {!! Form::open(['route' => ['patients.destroy', $patient->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('patients.show', [$patient->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('patients.edit', [$patient->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
