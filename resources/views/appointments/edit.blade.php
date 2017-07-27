@extends('layouts.app')

@section('content')

    {{--<script>--}}
        {{--function validateAppointmentsEditForm() {--}}
            {{--var clinic_id = document.forms["appointmentsEditForm"]["clinic_id"].value;--}}
            {{--var section_id = document.forms["appointmentsEditForm"]["section_id"].value;--}}
            {{--var medic_id = document.forms["appointmentsEditForm"]["medic_id"].value;--}}
            {{--var date = document.forms["appointmentsEditForm"]["date"].value;--}}
            {{--if (clinic_id == 0 || section_id == 0 || medic_id == 0 || date == 0) {--}}
                {{--alert("Completeaza toate datele si incearca din nou!");--}}
                {{--return false;--}}
            {{--}--}}
        {{--}--}}
    {{--</script>--}}
<div class="container">
    <a href="/cities/add" value = "Add Cities"> </a>

    <div class="row", style = 'margin-top: 50px;'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Programari</div>
                <td class="panel-body">
                    <h3 style = "margin-left:10px;"> Editare programare {{$appointment->id}} </h3>
                    <form name="appointmentsEditForm" method ='post' action = "{{action('AppointmentsController@update', $appointment->id)}}">
                        <select name="clinic_id" value="" style = "margin-right:10px;margin-left:10px;">
                            <option value = "0">Selecteaza o clinica</option>
                            @php foreach ($clinics as $clinic) { @endphp
                            <option value = "{{$clinic->id}}">{{$clinic->name}}</option>
                            @php   } @endphp
                        </select>

                        <select name="section_id" value=""style = "margin-right:10px;">
                            <option value = "0">Selecteaza o sectie</option>
                            @php foreach ($sections as $section) { @endphp
                            <option value = "{{$section->id}}">{{$section->name}}</option>
                            @php   } @endphp
                        </select>

                        <select name="medic_id" value="" style = "margin-right:10px; margin-left:10px;">
                            <option value = "0">Selecteaza medicul</option>
                            @php foreach ($medics as $medic) { @endphp
                            <option value = "{{$medic->id}}">{{$medic->name}}</option>
                            @php   } @endphp
                        </select>



                        <input type="text" placeholder="Data" name="date" value="" style="height:30px; margin-left:10px;">
                        <select name="status" value = ''>
                            <option value="0"> Selecteaza statusul </option>
                            <option value="1"> In procesare </option>
                            <option value="2"> Aprobata </option>
                        </select>
                        <input type="submit" value="Submit" style = "margin-bottom: 10px; margin-left:10px;" class="btn btn-default" onclick="validateAppointmentsEditForm()">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/validations.js') }}"></script>
@endsection
