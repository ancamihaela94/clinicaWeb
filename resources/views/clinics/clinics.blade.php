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
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default"style = "margin-left: -100px; margin-right:-100px;" >
                <div class="panel-heading">Clinici</div>
                <td class="panel-body">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Denumire Clinica </th>
                            <th> Locatie </th>
                            <th> Status </th>
                            <th> Actiuni </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clinics as $clinic)
                            <tr>
                            <th>{{ $clinic['id'] }}</th>
                            <th>{{ $clinic['clinic_name'] }} </th>
                            <th>{{ $clinic['name'] }} </th>
                                @php
                                if ($clinic['status'] == 1)
                                {
                                    echo " <th> Activ </th>";
                                }
                                else echo "<th> Inactiv </th>";
                                @endphp
                                <th>
                                    <a href = '/clinics/edit/{{$clinic['id']}}'><i class="icon-edit"></i> Editeaza</a>
                                    <a href = '/clinics/show-sections/{{$clinic['id']}}'style="padding-left: 20px;"><i class="fa fa-bars" aria-hidden="true"></i> Asociere Sectii</a>
                                    <a href = '/clinics/delete/{{$clinic['id']}}' style = "padding-left: 20px;" onclick="return confirm('Esti sigur ca vrei sa stergi aceasta intrare?')"><i class="icon-trash"></i> Sterge</a>
                                </th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            <a href="/clinics/add", style="margin-left:-100px"><i class="fa fa-plus" aria-hidden="true"></i> Adauga o clinica noua </a>
            </div>
        </div>
    </div>

@endsection
