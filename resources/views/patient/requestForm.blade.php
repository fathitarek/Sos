@extends('patient.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Request Doctor</div>

                <div class="panel-body">
                    <form method="post"  action="{{ url('/patient/requestDoctor') }}" id="requestDoctorform">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                            <label>Choose Speciality</label>
                                <select id="speciality" name="speciality">
                                  @foreach($specialities as $speciality)
                                    @if(app()->getlocale() == 'en')
                                      <option value="{{ $speciality->id }}"> {{ $speciality->name_en }} </option>
                                    @elseif(app()->getlocale() == 'ar')
                                      <option value="{{ $speciality->id }}"> {{ $speciality->name_ar }} </option>
                                    @endif
                                  @endforeach
                                </select>

                                <input type="hidden" name="patient" value="{{ $patient->id }}" />
                          </div>
                      </div>
                      <button type="submit">Request</button>

                      <script>

                          function submitForm()
                          {
                            var select_element = document.getElementById("speciality");
                            var speciality_id = select_element.options[select_element.selectedIndex].value ;
                            var form = document.getElementById("requestDoctorform");
                            form.action = "/requestDoctor/" + speciality_id ;
                            form.submit();
                          }

                      </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
