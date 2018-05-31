@extends('layouts.app')
@section('content')

    @if(Auth::check())
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">

                @if( Auth::user()->type == '2')
                    <a href="{{route('users.create')}}" class="btn btn-outline-primary">Prideti studentus i grupes</a>
            @endif

            <!-- Default panel contents -->
                <br><br>
                <div class="panel-heading"><b>Grupes:</b></div>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>
                            @if( Auth::user()->type == '2')
                            <a href="{{route('groups.create')}}" class="btn btn-primary">Prideti nauja</a>
                            @endif
                        </th>
                        <th>Kurso pavadinimas</th>
                        <th>Grupes pavadinimas</th>
                        <th>Pradzia</th>
                        <th>Pabaiga</th>
                    </tr>
                    @foreach($groups as $group)
                        <tr>
                            <td></td>
                            <td>
                                @foreach ($courses as $course)
                                    @if($group->course_id == $course->id)
                                        {{$course->course_name}}
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                <a href="{{route('users.show', $group->id)}}">{{$group->group_name}}</a>
                            </td>
                            <td>
                                {{$group->begins}}
                            </td>
                            <td>
                                {{$group->ends}}
                            </td>
                            <td>
                                    @if (Auth::user()->type == '2')
                                    <a href="{{route('sendMessages', $group->id)}}"  class="btn btn-outline-info"><i class="fa fa-envelope"></i></a>
                                @else
                                    <a href="{{route('messages.index')}}"  class="btn btn-outline-info"><i class="fa fa-envelope"></i></a>
                                @endif
                                    @if (Auth::user()->type == '2')
                                    <a href="{{route('groups.edit',$group->id)}}" class="btn btn-outline-success">Redaguoti</a>

                                    <a href="{{route('groupDelete', $group->id)}}" class="btn btn-danger">Istrinti</a>
                                @endif
                                    <a href="{{route('lectures.show', $group->id)}}" class="btn btn-warning">Rodyti pamokas</a>

                            </td>
                        </tr>
                    @endforeach

                </table>
                    @if (Auth::user()->type == '2')
                <a href="{{route('course.index')}}"class="btn btn-warning">Rodyti kursus</a>
                    @endif

            </div>
        </div>
    </div>
    </div>
    @endif

@endsection