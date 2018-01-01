<table class="table table-responsive" id="routes-table">
    <thead>
        <tr>
            <th>Route</th>
        <th>Role</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($routes as $route)
        <tr>
            <td>{!! $route->route       !!}</td>
            <td>{!! $route->role['role']  !!}</td>
            <td>
                {!! Form::open(['route' => ['routes.destroy', $route->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('routes.show', [$route->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('routes.edit', [$route->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>