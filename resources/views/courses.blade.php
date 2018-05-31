@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">


            <!-- Default panel contents -->
                <br><br>
                <div class="panel-heading"><b>Kursai:</b></div>


                <!-- Table -->
                <table class="table">

                    <tr>

                        <th>
                            @if( Auth::user()->type == '2')
                                <a href="{{route('course.create')}}" class="btn btn-primary">Prideti nauja</a>
                            @endif
                        </th>


                        <th>Programos</th>


                    </tr>

                    @foreach($courses as $course)

                        <tr>
                            <td></td>

                            <td>
                                {{$course->course_name}}
                            </td>

                            <td>
                                @if (Auth::user()->type == '2')

                                    <a href="{{route('courseDelete', $course->id)}}" class="btn btn-danger">Istrinti</a>

                                @endif
                            </td>



                        </tr>
                    @endforeach




                </table>
                <a href="{{route('groups.index')}}"class="btn btn-warning">Rodyti grupes</a>


            </div>
        </div>
    </div>
    </div>

@endsection