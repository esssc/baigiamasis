@extends('layouts.app')

@section('content')


    <div class="container">

    <div class="row">


        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Prideti nauja programa</h4>
            <form method="POST" action="{{route('course.store')}}">

                @csrf


                    <div class="col-md-6 mb-3">
                        <label for="firstName">Programos pavadinimas :</label>
                        <input type="text" class="form-control" name="course_name" id="course_name" placeholder="" value="">
                        @foreach ($errors->get('course_name') as $error)
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