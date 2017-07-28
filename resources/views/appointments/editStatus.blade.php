@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/cities/add" value = "Add Cities"> </a>

    <div class="row", style = 'margin-top: 50px;'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Programari</div>
                <td class="panel-body">
                    <h3 style = "margin-left:10px;"> Editare programare {{$appointments->id}} </h3>
                    <form name="appointmentsEditStatusForm" method ='post' action = "{{action('AppointmentsController@updateStatus', $appointments->id)}}">
                        <select name="status" value = ''>
                            <option value="0"> Selecteaza statusul </option>
                            <option value="1"> In procesare </option>
                            <option value="2"> Aprobata </option>
                        </select>
                        <input type="submit" value="Submit" style = "margin-bottom: 10px; margin-left:20px;" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
