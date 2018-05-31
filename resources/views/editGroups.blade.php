@extends('layouts.app')



@section('content')
    <div class="container">

    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->

            <div class="panel-body">

                <form action="{{route('groups.update', $group->id)}}" method="post">

                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="vardas">Grupes pavadinimas</label>
                        <input name="group_name" type="text" class="form-control"   value="{{$group->group_name}}">
                        @foreach ($errors->get('group_name') as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="pavarde">Pradzia</label>
                        <input name="begins" type="date" class="form-control"   value="{{$group->begins}}">
                        @foreach ($errors->get('begins') as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="pavarde">Pabaiga</label>
                        <input name="ends" type="date" class="form-control"  value="{{$group->ends}}">
                        @foreach ($errors->get('ends') as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>



                    <input type="submit" name="save" class="btn btn-primary" value="Išsaugoti">
                </form>
            </div>
        </div>
    </div>
    </div>


@endsection