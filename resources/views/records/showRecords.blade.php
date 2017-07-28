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
                <div class="panel-heading"> Fise medicale asociate {{$users->name}}
                    {{--<a href = '/records/show-records/{{$users->id}}', style="float:right"><i class="icon-edit"></i> Asociere sectii</a>--}}
                </div>
                <td class="panel-body">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th> Medic </th>
                            <th> Sectie </th>
                            <th> Descriere </th>
                            <th> Data </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <th>{{ $record['medic_name'] }}</th>
                                <th>{{ $record['section_name'] }} </th>
                                <th>{{ $record['description'] }} </th>
                                <th>{{ $record['created_at'] }} </th>
                                <th> </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
    </div>
            <a href="/records/add-records/{{$users->id}}"><i class="fa fa-plus" aria-hidden="true"></i> Adauga o noua intrare </a>
</div>


@endsection
