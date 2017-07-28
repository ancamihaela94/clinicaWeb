@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style = "margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Programari</div>

                <div class="panel-body">
            <h3> Adauga o programare noua</h3>
                    <form method ='post' action = "{{action('AppointmentsController@create')}}">
                        <select required name="user_id" value="">
                            <option value = "">Selecteaza pacientul</option>
                            @php foreach ($users as $user) { @endphp
                            <option value = "{{$user->id}}">{{$user->name}}</option>
                            @php   } @endphp
                        </select>
                        <select required name="clinic_id" value="" class="clinics-select">
                            <option value = "">Selecteaza o clinica</option>
                            @php foreach ($clinics as $clinic) { @endphp
                            <option value = "{{$clinic->id}}">{{$clinic->name}}</option>
                            @php   } @endphp
                        </select>
                        <select required name="section_id" value="" class="sections-select">
                            <option value = "">Selecteaza o sectie</option>
                            {{--@php foreach ($sections as $section) { @endphp--}}
                            {{--<option value = "{{$section->id}}">{{$section->name}}</option>--}}
                            {{--@php   } @endphp--}}
                        </select>
                        <select required name="medic_id" value="" class = "medics-select">
                            <option value = "">Selecteaza medicul</option>
                        </select>
                        <input required type="datetime-local" placeholder= "Data" name="date" value="" style="height:30px">
                        <br>
                        <textarea required type="text" placeholder= "Motiv" name="reason" value="" col="4" style="width: 670px;" ></textarea>



                        <input type="submit" value="Submit" style = "margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
