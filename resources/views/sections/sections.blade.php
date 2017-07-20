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
                <div class="panel-heading">Sectii</div>
                <td class="panel-body">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Denumire </th>
                            <th> Actiuni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sections as $section)
                            <tr>
                            <th>{{ $section['id'] }}</th>
                            <th>{{ $section['name'] }} </th>
                                <th>
                                    <a href = '/sections/edit/{{$section['id']}}'><i class="icon-edit"></i> Editeaza</a>
                                    <a href = '/sections/delete/{{$section['id']}}' style = "padding-left: 10px;"><i class="icon-trash"></i> Sterge</a>
                                </th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            <a href="/sections/add"> Adauga o sectie noua </a>
            </div>
        </div>
    </div>
</div>
@endsection
