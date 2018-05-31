@extends('layouts.app')



@section('content')
    <div class="container">

        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <div class="panel-body">

                    <form action="{{route('users.update', $user->id)}}" method="post">

                        @method('put')
                        @csrf


                        <div class="form-group">
                            <label for="pavarde">Telefonas</label>
                            <input name="phone" type="text" class="form-control"   value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="pavarde">Pabaiga</label>
                            <input name="email" type="text" class="form-control"  value="{{$user->email}}">
                        </div>



                        <input type="submit" name="save" class="btn btn-primary" value="Išsaugoti">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection