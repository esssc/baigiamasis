@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('messages.store')}}">
            @csrf
        <div class="row">
                    <input type="hidden" name="group_id" value="{{$group_id}}">

                    <div class="col-md-12 mb-3">
                        <textarea name="message" id="message" cols="100" rows="5"></textarea>
                        @foreach ($errors->get('about') as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>


                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Išsaugoti</button>

            </div>

        </form>
    </div>

@endsection