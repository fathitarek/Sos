<table class="table table-responsive" id="menuItems-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Display Name</th>
        <th>Url</th>
        <th>Menu</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($menuItems as $menuItems)
        <tr>
            <td>{!! $menuItems->name !!}</td>
            <td>{!! $menuItems->display_name !!}</td>
            <td>{!! $menuItems->url !!}</td>
            <td>{!! $menuItems->menu->display_name !!}</td>
            <td>
                {!! Form::open(['route' => ['menuItems.destroy', $menuItems->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('menuItems.show', [$menuItems->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('menuItems.edit', [$menuItems->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    
    </tbody>
</table>