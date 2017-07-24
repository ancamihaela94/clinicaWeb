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
            <div class="panel panel-default">
                <div class="panel-heading">Locatii</div>
                <td class="panel-body">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Pacient </th>
                            <th> Medic </th>
                            <th> Clinica </th>
                            <th> Sectie </th>
                            <th> Motiv </th>
                            <th> Data </th>
                            <th> Actiuni </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                            <th>{{ $appointment['id'] }}</th>
                            <th>{{ $appointment['users_name'] }} </th>
                            <th>{{ $appointment['medic_name'] }} </th>
                            <th>{{ $appointment['clinic_name'] }} </th>
                            <th>{{ $appointment['section_name'] }} </th>
                            <th>{{ $appointment['reason'] }} </th>
                            <th>{{ $appointment['date'] }} </th>
                            <th>
                                <a href = '/appointments/edit/{{$appointment['id']}}'><i class="icon-edit"></i> Editeaza </a>
                                {{--<a href = '/appointments/delete/{{$appointment['id']}}' style = "padding-left: 10px;"><i class="icon-trash"></i> Sterge</a>--}}
                             </th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            <a href="/appointments/add"> Adauga o noua programare </a>
            </div>
        </div>
    </div>
</div>
@endsection
