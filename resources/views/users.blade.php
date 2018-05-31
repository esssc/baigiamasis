@extends('layouts.app')
@section('content')

    @if(Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">




                <!-- Default panel contents -->
                    <br><br>
                    <div class="panel-heading"><b>Grupes:</b></div>


                    <!-- Table -->
                    <table class="table">

                        <tr>
                            <th></th>

                            <th>Mokiniai</th>

                            <th>Elektronis pastas</th>
                            <th>Telefonas</th>

                        </tr>


                        @foreach($groups->users as $user)

                            <tr>
                                <td></td>

                                <td>
                                    {{$user->name}}
                                    {{$user->surname}}
                                </td>

                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>

                                <td>
                                    @if (Auth::user()->type == '2')


                                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-success">Redaguoti</a>

                                        <a href="{{route('userDelete', $user->id)}}" class="btn btn-danger">Istrinti</a>

                                    @endif
                                </td>

                            </tr>
                        @endforeach

                    </table>
                    <a href="{{route('course.index')}}"class="btn btn-warning">Rodyti kursus</a>
                    <a href="{{route('groups.index')}}"class="btn btn-warning">Rodyti grupes</a>




                </div>
            </div>
        </div>
    </div>
    @endif

@endsection