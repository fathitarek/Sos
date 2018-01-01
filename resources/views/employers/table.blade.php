<table class="table table-responsive" id="employers-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact Person</th>
        <th>Mobile</th>
        <th>Published</th>
        <th>Approved</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employers as $employer)
        <tr>
            <td>{!! $employer->name !!}</td>
            <td>{!! $employer->address !!}</td>
            <td>{!! $employer->email !!}</td>
            <td>{!! $employer->contact_person !!}</td>
            <td>{!! $employer->mobile !!}</td>
            <td>{!! $employer->published !!}</td>
            <td>{!! $employer->approved !!}</td>
            <td>
                {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employers.show', [$employer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employers.edit', [$employer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>