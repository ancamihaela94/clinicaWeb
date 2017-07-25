@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style = "margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
            <h3> Asociere sectii</h3>
                    <form method ='post' action = "{{action('ClinicsController@associateSections',$clinics->id)}}">
                        <select name="section_id[]" value="" multiple>
                            <option value = "0">Selecteaza o sectie</option>
                            @php foreach ($sections as $section) { @endphp
                                <option value = "{{$section->id}}">{{$section->name}}</option>
                            @php   } @endphp
                        </select>
                        <input type="submit" name="submit" value="Submit" style = "margin-top: -10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
