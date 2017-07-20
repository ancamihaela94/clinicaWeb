@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/cities/add" value = "Add Cities"> </a>

    <div class="row", style = 'margin-top: 50px;'>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cities</div>
                <td class="panel-body">
                    <h3> Editare Sectie {{$section->name}} </h3>
                    <form method ='post' action = "{{action('SectionsController@update', $section->id)}}">
                        <input type="text" placeholder="Denumire Sectie" name="sectionName" value="" style="height:30px">
                        <input type="submit" value="Submit" style = " margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
