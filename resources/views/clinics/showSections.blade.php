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
                <div class="panel-heading"> Sectii asociate clinicii {{$clinics->name}}
                    <a href = '/clinics/add-sections/{{$clinics->id}}', style="float:right"><i class="icon-edit"></i> Asociere sectii</a>
                </div>
                <td class="panel-body">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Denumire Sectie </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <th>{{ $section['id'] }}</th>
                                <th>{{ $section['name'] }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
    </div>
            {{--<a href="/clinics/add"> Adauga o clinica noua </a>--}}
</div>


@endsection
