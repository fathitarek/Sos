<table class="table table-responsive" id="settings-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Url</th>
        <th>Logo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($settings as $setting)
        <tr>
            <td>{!! $setting->name !!}</td>
            <td>{!! $setting->url !!}</td>
            <td> <p>{!!$setting->logo ? '<img src="/upload/'.$setting->logo.'" height="40"/>':''!!}</p></td>
            <td>
                {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('settings.show', [$setting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('settings.edit', [$setting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>