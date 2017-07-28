@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/cities/add" value = "Add Cities"> </a>

    <div class="row", style = 'margin-top: 50px;'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadre medicale</div>
                <td class="panel-body">
                    <h3 style="margin-left: 10px"> Editare Utilizator {{$user->name}} </h3>
                    <form method ='post' action = "{{action('UsersController@update', $user->id)}}">
                        <input required type="text" placeholder="Numar de telefon" name="phoneNo" value="" style="height:30px; margin-left: 10px;">
                        <select required name="status" value="">
                            <option value=""> Selecteaza disponibilitatea</option>
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
