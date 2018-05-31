@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <div class="panel-body">

                    <form action="{{route('lectures.update', $lectures->id)}}" method="post">

                        @method('put')
                        @csrf

                        <input type="hidden" name="group_id" value="{{$group_id}}" >
                        <div class="form-group">
                            <label for="pavarde">Telefonas</label>
                            <input name="lecture_name" type="text" class="form-control"   value="{{$lectures->lecture_name}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea name="about" id="about" cols="200" rows="10"></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="date">Data :</label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="" value="{{$lectures->date}}" required>
                        </div>
                        <input type="submit" name="save" class="btn btn-primary" value="Išsaugoti">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection