<table class="table table-responsive" id="locations-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>City</th>
        <th>Region</th>
        <th>Patient</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($locations as $locations)
        <tr>
            <td>{!! $locations->name !!}</td>
            <td>{!! $locations->address !!}</td>
            <td>{!! $locations->phone !!}</td>
            <td>{!! $locations->latitude !!}</td>
            <td>{!! $locations->longitude !!}</td>
            <td>{!! $locations->city->display_name_en !!}</td>
            <td>{!! $locations->region->display_name_en !!}</td>
            <td>{!! $locations->patient->name !!}</td>
            <td>
                {!! Form::open(['route' => ['locations.destroy', $locations->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('locations.show', [$locations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('locations.edit', [$locations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>