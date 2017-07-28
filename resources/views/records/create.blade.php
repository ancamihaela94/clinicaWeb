@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style = "margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Programari</div>

                <div class="panel-body">
            <h3> Adauga o fisa medicala noua</h3>
                    <form method ='post' action = "{{action('RecordsController@createRecords', $users->id)}}">

                        <select required name="clinic_id" value="" style="margin-right:70px;" class="clinics-select">
                            <option value = "">Selecteaza o clinica</option>
                            @php foreach ($clinics as $clinic) { @endphp
                            <option value = "{{$clinic->id}}">{{$clinic->name}}</option>
                            @php   } @endphp
                        </select>
                        <select required name="section_id" value=""style="margin-right:50px;" class="sections-select">
                            <option value = "">Selecteaza o sectie</option>

                        </select>
                        <textarea required rows="'15" cols="50" name="description" placeholder="Descriere" style = 'width: 515px;    height: 115px;'></textarea>


                        <input type="submit" value="Submit" style = "margin-bottom: 10px" class="btn btn-default">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
