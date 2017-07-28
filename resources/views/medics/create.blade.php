@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style = "margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-left: -100px;margin-right: -100px;">
                <div class="panel-heading">Sectii</div>

                <div class="panel-body">
            <h3> Adauga un nou cadru medical</h3>

                    <form method ='post' action = "{{action('MedicsController@create')}}">
                        <input type="text" placeholder= "Nume" name="medicName" value="" style="height:30px; margin-right: 20px;" required>
                        <input type="email" placeholder= "Email" name="email" value="" style="height:30px; margin-right: 20px;" required>
                        <input type="text" placeholder= "Password" name="password" value="qwerty123" style="height:30px; margin-right: 20px;" required>
                        <input type="text" placeholder= "Nr Telefon" name="phoneNo" value="" style="height:30px; margin-right: 20px;" required>
                        <select required name="status" value="" style="margin-right: 20px; margin-top:20px; ">
                            <option value=""> Selecteaza disponibilitatea</option>
                            <option value="1"> Activ</option>
                            <option value="2"> Inactiv</option>
                        </select>

                        <select required name="section_id" style="margin-right: 20px;margin-top:20px;  " class = "medic-section-select">
                        <option value = "">Selecteaza o sectie</option>
                        @php foreach ($sections as $section) { @endphp
                        <option value = "{{$section->id}}">{{$section->name}}</option>
                        @php   } @endphp
                        </select>

                        <select required name="clinic_id" style="margin-right: 20px;margin-top:20px;  " class="medic-clinic-select">
                            <option value = "">Selecteaza o clinica</option>

                        </select>

                        <input type="submit" value="Submit" style = " margin-bottom: 10px; margin-top:20px; " class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
