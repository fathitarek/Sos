@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    table, td, th {
        border: 1px solid black;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th {
        height: 50px;
        text-align: center !important;
    }
    td {
        text-align: center !important;
    }
    form {
        margin-bottom: 5px;
        margin-top: 5px;
    }
</style>
@section('content')
<h1>Doctors</h1>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <form method="get"  id="Form" action="/admin/doctors/filter">
                    <div class="form-group radio">
                        <label id="activeLabel"><input type="radio" id="active" name="filter" value="active">active</label>
                    </div>
                    <div class="form-group radio">
                        <label><input type="radio" id="approved" name="filter" value="approved">approved</label>
                    </div>
                    <div class="form-group radio">
                        <label><input type="radio"  id="verify" name="filter" value="verify">verify</label>
                    </div>
                    <div class="form-group radio">
                        <label><input type="radio" id="rejected" name="filter" value="rejected">rejected</label>
                    </div >
                    <div class=" form-group radio">
                        <label><input type="radio" id="pending" name="filter" value="pending">pending</label>
                    </div>
                    <div class=" form-group radio">
                        <label><input type="radio" id="approved_terms" name="filter" value="approved_terms">approved terms</label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Filter
                            </button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<article>
    <ul>

    </ul>
    <table>
        <tr>

            <th>Name</th>
            <th>National id</th>
            <th>Address </th>
            <th> National Image</th>
            <th> Personal Image</th>
            <th>front_medical_syndicate</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        Number of pending doctors is :  {{$count}}
        @if(count($data))
        @foreach ($data as $record)
            <tr>
                <td>{{$record->name}}</td>
                <td>{{$record->national_id}}</td>
                <td>{{$record->address}}</td>
                <td><div>{!!$record->image_national_id ? '<img src="/upload/'.$record->image_national_id.'" height="40"/>':''!!}</div> </td>
                <td><div>{!!$record->personal_photo ? '<img src="/upload/'.$record->personal_photo.'" height="40"/>':''!!}</div> </td>
                <td><div>{!!$record->front_medical_syndicate ? '<img src="/upload/'.$record->front_medical_syndicate.'" height="40"/>':''!!}</div> </td>
                <td>
                    <a href="{{action('DoctorController@edit',[$record->id])}}" class="btn btn-primary from-control">Edit</a>
                </td>
                <td>
                    @include('admin.form_parcials.universal_delete_btn',['action'=>'DoctorController@destroy'])
                </td>
            </tr>
            </tr>
        @endforeach
        @endif
    </table>
    {{$data->render()}}
</article>


@endsection
