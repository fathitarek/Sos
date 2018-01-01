@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Menus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {{ Form::model($record, array('route' => array('menus.update', $record->id), 'method' => 'PATCH')) }}

                        @include('admin.menus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
