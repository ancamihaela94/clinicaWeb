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
                            <th> Denumire Oras </th>
                            <th> Actiuni </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cities as $city)
                            <tr>
                            <th>{{ $city['id'] }}</th>
                            <th>{{ $city['name'] }} </th>
                                <th>
                                    <a href = '/cities/edit/{{$city['id']}}'><i class="icon-edit"></i> Editeaza </a>
                                    <a href = '/cities/delete/{{$city['id']}}' style = "padding-left: 10px;"><i class="icon-trash"></i> Sterge</a>
                                </th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            <a href="/cities/add"><i class="fa fa-plus" aria-hidden="true"></i> Adauga o noua locatie </a>
            </div>
        </div>
    </div>
</div>
@endsection
