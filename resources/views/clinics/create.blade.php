@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style = "margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clinici</div>

                <div class="panel-body">
            <h3> Adauga o clinica noua</h3>
                    <form method ='post' action = "{{action('ClinicsController@create')}}">
                        <input type="text" placeholder= "Denumirea Clinicii" name="clinicName" value="" style="height:30px">
                        <select name="status" value="">
                            <option value="0"> Selecteaza disponibilitatea</option>
                            <option value="1"> Activ</option>
                            <option value="2"> Inactiv</option>
                        </select>
                        {{--<input type="text" placeholder= "Clinic Status" name="status" value="1">--}}
                        <select name="cityId" value="">
                            <option value = "0">Selecteaza o locatie</option>
                            @php foreach ($cities as $city) { @endphp
                                <option value = "{{$city->id}}">{{$city->name}}</option>
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
