<table class="table table-responsive" id="specialties-table">
    <thead>
        <tr>
            <th>Name En</th>
        <th>Name Ar</th>
        <th>Published</th>
        <th>Approved</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($specialties as $specialty)
        <tr>
            <td>{!! $specialty->name_en !!}</td>
            <td>{!! $specialty->name_ar !!}</td>
            <td>{!! $specialty->published !!}</td>
            <td>{!! $specialty->approved !!}</td>
            <td>
                {!! Form::open(['route' => ['specialties.destroy', $specialty->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('specialties.show', [$specialty->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('specialties.edit', [$specialty->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>