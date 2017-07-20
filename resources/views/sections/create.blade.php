@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style = "margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sectii</div>

                <div class="panel-body">
            <h3> Adauga o sectie noua</h3>

                    <form method ='post' action = "{{action('SectionsController@create')}}">
                        <input type="text" placeholder= "Denumirea sectiei" name="sectionName" value="" style="height:30px">
                        <input type="submit" value="Submit" style = " margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
