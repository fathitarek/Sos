@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Locations
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($locations, ['route' => ['locations.update', $locations->id], 'method' => 'patch']) !!}

                        @include('locations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection