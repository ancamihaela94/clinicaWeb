@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style = "margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sectii</div>

                <div class="panel-body">
            <h3> Adauga un nou cadru medical</h3>

                    <form method ='post' action = "{{action('MedicsController@create')}}">
                        <input type="text" placeholder= "Nume" name="medicName" value="" style="height:30px">
                        <input type="text" placeholder= "Email" name="email" value="" style="height:30px">
                        <input type="text" placeholder= "Password" name="password" value="qwerty123" style="height:30px">
                        <input type="text" placeholder= "Nr Telefon" name="phoneNo" value="" style="height:30px">
                        <select name="status" value="">
                            <option value="0"> Selecteaza disponibilitatea</option>
                            <option value="1"> Activ</option>
                            <option value="2"> Inactiv</option>
                        </select>
                        <input type="submit" value="Submit" style = " margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
