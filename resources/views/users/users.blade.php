@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('flash_message'))
        <div class="alert alert-success alert-dismissable" style="padding-top: 10px; margin-top: 10px"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em> {!! session('flash_message') !!}</em></div>
    @endif
    @if(Session::has('error_message'))
        <div class="alert alert-danger alert-dismissable" style="padding-top: 10px; margin-top: 10px"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em> {!! session('error_message') !!}</em></div>
    @endif


    <div class="row", style = 'margin-top: 50px;'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-left: -100px;margin-right: -100px;">

                <form method ='post' action = "{{action('UsersController@filterUsers')}}">
                    <input type="text" placeholder= "Filtreaza dupa nume" name="name" value="" style="height:30px; margin-left:10px;margin-top:10px;" >
                    <input type="text" placeholder= "Filtreaza dupa email" name="name" value="" style="height:30px; margin-left:10px;margin-top:10px;" >
                    <input type="text" placeholder= "Filtreaza dupa Nr Telefon" name="name" value="" style="height:30px; margin-left:10px;margin-top:10px;" >
                    <br>
                    <input type="submit" value="Cauta" style = "margin-bottom: 10px; margin-left:10px;" class="btn btn-default">
                    <input type="submit" value="Reseteaza" onclick="location.href='/users'" style = "margin-bottom: 10px" class="btn btn-default">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>


                <div class="panel-heading">Utilizatori</div>
                <td class="panel-body">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Nume </th>
                            <th> Email </th>
                            <th> Nr. Telefon </th>
                            <th> Status </th>
                            <th> Actiuni </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <th>{{ $user['id'] }}</th>
                            <th>{{ $user['name'] }} </th>
                            <th>{{ $user['email'] }} </th>
                            <th>{{ $user['phone_number'] }} </th>
                                @php
                                    if ($user['status'] == 1)
                                    {
                                        echo " <th> Activ </th>";
                                    }
                                    else echo "<th> Inactiv </th>";
                                @endphp
                                <th><a href = '/users/edit/{{$user['id']}}'><i class="icon-edit"></i> Editeaza</a></th>
                                <th><a href = '/records/show-records/{{$user['id']}}'><i class="fa fa-eye" aria-hidden="true"></i> Fisa Medicala</a></th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
