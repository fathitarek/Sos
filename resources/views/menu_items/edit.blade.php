@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Menu Items
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($menuItems, ['route' => ['menuItems.update', $menuItems->id], 'method' => 'patch']) !!}

                        @include('menu_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection