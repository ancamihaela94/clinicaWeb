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
                <div class="panel-heading">Cadre medicale</div>
                <td class="panel-body">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Denumire </th>
                            <th> Email </th>
                            <th> Nr. Telefon </th>
                            <th> Status </th>
                            <th> Sectie </th>
                            <th> Actiuni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($medics as $medic)
                            <tr>
                            <th>{{ $medic['id'] }}</th>
                            <th>{{ $medic['name'] }} </th>
                            <th>{{ $medic['email'] }} </th>
                            <th>{{ $medic['phone_number'] }} </th>
                                @php
                                    if ($medic['status'] == 1)
                                    {
                                        echo " <th> Activ </th>";
                                    }
                                    else echo "<th> Inctiv </th>";
                                @endphp
                                <th> {{$medic['section_name']}}</th>
                                <th>
                                    <a href = '/medics/edit/{{$medic['id']}}'><i class="icon-edit"></i> Editeaza</a>
                                    <a href = '/medics/delete/{{$medic['id']}}' style = "padding-left: 10px;"><i class="icon-trash"></i> Sterge</a>
                                </th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            <a href="/medics/add" style = "margin-left: -100px;"> Adauga un nou cadru medical </a>
            </div>
        </div>
    </div>
</div>
@endsection
