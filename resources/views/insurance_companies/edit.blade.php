@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Insurance Company
        </h1>
   </section>

   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($insuranceCompany, ['route' => ['insuranceCompanies.update', $insuranceCompany->id], 'method' => 'patch']) !!}

                        @include('insurance_companies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>

       @if(Auth::user()->role->role=="Super User")
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                 <div class="form-group col-sm-6">
                     <h1>Assign Manger</h1>
                     <form method="post" action="/insurance_add_manger/{{$insuranceCompany->id}}">
                       {{ csrf_field() }}
                       <label for="manger">Add Manger</label>
                       <select name="manger">
                         <option disabled selected>Assign Manger</option>
                         @foreach($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                          @endforeach
                       </select>
                   </div>
                 </div>
                 <button name="add_manger" class="btn btn-primary" type="submit" >Add</button>

                  @if(isset($insuranceCompany->manger))
                    </form>
                      <form id="remove_manger" style="display: none;" method="post" action="/insurance_remove_manger/{{$insuranceCompany->id}}">
                          {{ csrf_field() }}
                      </form>
                     <h4>Current Manger : {{ $insuranceCompany->manger->name }}</h4>
                     <a href="/insurance_remove_manger/{{$insuranceCompany->id}}" onclick="event.preventDefault(); document.getElementById('remove_manger').submit();"
                       class="btn btn-default" type="submit" >Remove</a>
                   @endif
           </div>
       </div>
       @endif

   </div>
@endsection
