@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">


            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Prideti nauja paskaita</h4>
                <form method="POST" action="{{route('lectures.store')}}">

                    @csrf

                        <input type="hidden" name="group_id" value="{{$group_id}}">

                    <div class="col-md-4 mb-3">
                        <label for="firstName">Paskaitos pavadinimas :</label>
                        <input type="text" class="form-control" name="lecture_name" id="lecture_name" placeholder="" value="" >
                        @foreach ($errors->get('lecture_name') as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 mb-3">
                        <textarea name="about" id="about" cols="200" rows="10"></textarea>
                        @foreach ($errors->get('about') as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="firstName">Data :</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="" value="" >
                        @foreach ($errors->get('date') as $error)
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