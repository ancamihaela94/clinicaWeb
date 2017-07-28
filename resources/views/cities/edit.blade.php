@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/cities/add" value = "Add Cities"> </a>

    <div class="row", style = 'margin-top: 50px;'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cities</div>
                <td class="panel-body">
                    <h3 style = "margin-left: 10px;"> Editare locatie {{$city->name}} </h3>
                    <form method ='post' action = "{{action('CitiesController@update', $city->id)}}">
                        <input type="text" placeholder="Denumire Locatie" name="cityName" value="" style="height:30px; margin-left:10px;" required>
                        <input type="submit" value="Submit" style = "margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
