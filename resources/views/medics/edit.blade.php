@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/cities/add" value = "Add Cities"> </a>

    <div class="row", style = 'margin-top: 50px;'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Medici</div>
                <td class="panel-body">
                    <h3> Editare Cadru medical {{$medic->name}} </h3>
                    <form method ='post' action = "{{action('MedicsController@update', $medic->id)}}">
                        <input type="text" placeholder="Numar de telefon;" name="phoneNo" value="" style="height:30px">
                        @php
                            if ($medic['status'] == 1)
                            {
                                echo " <th> Activ </th>";
                            }
                            else echo "<th> Inctiv </th>";
                        @endphp
                        <input type="submit" value="Submit" style = " margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
