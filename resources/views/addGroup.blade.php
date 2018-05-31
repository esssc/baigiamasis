@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="row">


        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Prideti nauja programa</h4>
            <form method="POST" action="{{route('groups.store')}}">

                @csrf
                <div class="col-md-6 mb-3">
                <label for="course">Kursas:</label>
                    <select name="course_id" class="form-control">

                        @foreach($courses as $course)

                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                    
                        @endforeach

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="course">Destytojas:</label>
                    <select name="teacher_id" class="form-control">

                        @foreach($users as $user)
                            @if($user->type == 2)

                            <option value="{{$user->id}}">{{$user->name}}</option>

                            @endif
                        @endforeach

                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="firstName">Programos pavadinimas :</label>
                    <input type="text" class="form-control" name="group_name" id="group_name" placeholder="" value="">
                    @foreach ($errors->get('group_name') as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach

                </div>
                <div class="col-md-6 mb-3">
                    <label for="firstName">Pradzia :</label>
                    <input type="date" class="form-control" name="begins" id="begins" placeholder="" value="" >
                    @foreach ($errors->get('begins') as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6 mb-3">
                    <label for="firstName">Pabaiga :</label>
                    <input type="date" class="form-control" name="ends" id="ends" placeholder="" value="" >
                    @foreach ($errors->get('ends') as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>


                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Išsaugoti</button>
            </form>
        </div>
    </div>
    </div>

@endsection