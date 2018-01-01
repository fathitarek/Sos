@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADD New Menu</div>

                <div class="panel-body">

                    <form method="POST" action="{{ action('MenuController@index') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="menuname">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Menu name">
                            <small id="nameHelp" class="form-text text-muted">Menu name.</small>
                        </div>
                        @if ($errors->has('name'))
                        <div class="error alert alert-danger">
                            {{ $errors->first('name') }}
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Display Name</label>
                            <input type="text" name="display_name" class="form-control" id="display_name" placeholder="Display Name">
                        </div>
                        @if ($errors->has('display_name'))
                        <div class="error alert alert-danger">
                            {{ $errors->first('display_name') }}
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="title">URL</label>
                            <input type="text" name="url" class="form-control" id="url" placeholder="url">
                        </div>
                        @if ($errors->has('url'))
                        <div class="error alert alert-danger">
                            {{ $errors->first('url') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="2" placeholder="Description"></textarea>
                        </div>
                        @if ($errors->has('description'))
                        <div class="error alert alert-danger">
                            {{ $errors->first('description') }}
                        </div>
                        @endif

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="published" class="form-check-input">
                                Publish
                            </label>
                        </div>
                        <hr>
                        <button type="submit" name="add" class="btn btn-primary">ADD</button>

                        {{-- @if(count($errors))
                    <div class="form-group">
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error )
                         <li>{{ $error }}</li>
                    @endforeach
                    </ul>
            </div>
        </div>
        @endif --}}
        </form>

    </div>
</div>
</div>
</div>
</div>
@endsection
