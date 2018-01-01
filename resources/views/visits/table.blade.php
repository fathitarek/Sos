<table class="table table-responsive" id="visits-table">
    <thead>
        <tr>
            <th>Patient Id</th>
        <th>Doctor Id</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Status</th>
        <th>Charage</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($visits as $visit)
        <tr>
            <td>{!! $visit->patient_id !!}</td>
            <td>{!! $visit->doctor_id !!}</td>
            <td>{!! $visit->start_time !!}</td>
            <td>{!! $visit->end_time !!}</td>
            <td>{!! $visit->status !!}</td>
            <td>{!! $visit->charage !!}</td>
            <td>
                {!! Form::open(['route' => ['visits.destroy', $visit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('visits.show', [$visit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('visits.edit', [$visit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>