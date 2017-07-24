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

                        <select name="user_id" value="">
                            <option value = "0">Selecteaza pacientul</option>
                            @php foreach ($users as $user) { @endphp
                            <option value = "{{$user->id}}">{{$user->name}}</option>
                            @php   } @endphp
                        </select>
                        <select name="medic_id" value="">
                            <option value = "0">Selecteaza medicul</option>
                            @php foreach ($medics as $medic) { @endphp
                            <option value = "{{$medic->id}}">{{$medic->name}}</option>
                            @php   } @endphp
                        </select>
                        <select name="clinic_id" value="">
                            <option value = "0">Selecteaza o clinica</option>
                            @php foreach ($clinics as $clinic) { @endphp
                            <option value = "{{$clinic->id}}">{{$clinic->name}}</option>
                            @php   } @endphp
                        </select>
                        <select name="section_id" value="">
                            <option value = "0">Selecteaza o sectie</option>
                            @php foreach ($sections as $section) { @endphp
                            <option value = "{{$section->id}}">{{$section->name}}</option>
                            @php   } @endphp
                        </select>
                        <input type="text" placeholder= "Motiv" name="reason" value="" style="height:30px">
                        <input type="text" placeholder= "Data" name="date" value="" style="height:30px">


                        {{--BOOTSTRAP DATE PICKER--}}
                        {{--<div class="container">--}}
                            {{--<div class="row">--}}
                                {{--<div class='col-sm-6'>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<div class='input-group date' id='datetimepicker1'>--}}
                                            {{--<input type='text' class="form-control" />--}}
                                            {{--<span class="input-group-addon">--}}
                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<script type="text/javascript">--}}
                                    {{--$(function () {--}}
                                        {{--$('#datetimepicker1').datetimepicker();--}}
                                    {{--});--}}
                                {{--</script>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{---------------------------------------------}}

                        <input type="submit" value="Submit" style = "margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
