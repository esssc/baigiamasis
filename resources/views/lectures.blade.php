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

                        <th>
                            @if( Auth::user()->type == '2')
                                <a href="{{route('showLectures', $group_id)}}" class="btn btn-primary">Prideti nauja pamoka</a>

                            @endif
                        </th>
                        <th>Pamokos pavadinimas</th>
                        <th>Apie</th>
                        <th>Data</th>
                        <th>Failai <a href=""><i class="fas fa-trash-alt"></i></a></th>




                    </tr>

                    @foreach($lectures as $lecture)
                        <tr>
                            <td></td>

                            <td>
                                {{$lecture->lecture_name}}
                            </td>
                            <td>
                                {!! $lecture->about !!}
                            </td>
                            <td>
                                {{$lecture->date}}
                            </td>

                           <td>

                               <ul>
                                   @foreach($lecture->files as $file)
                                       @if( Auth::user()->type == '2' || $file->status == 0)
                                   <li>
                                       <a  href="{{asset('storage/App/public/'.$file->file)}}" download >{{$file->file_name}}</a> &nbsp

                                           @if( Auth::user()->type == '2')
                                                   @if( $file->status == 0)
                                                       <a href="{{route('hideFile', $file->id)}}" class=" btn-outline-danger" name="status" >Slepti faila</a>

                                                       @else
                                                           <a href="{{route('showFile', $file->id)}}" class=" btn-outline-success" name="status" >Rodyti faila</a>

                                                    @endif
                                           @endif
                                       &nbsp <a href="{{route('deleteFile', $file->id)}}" style="font-size: 18px" class=" btn-outline-danger"><i class="fa fa-trash"></i></a>
                                   </li>
                                       @endif
                                   @endforeach
                               </ul>

                           </td>

                            <td>
                                @if (Auth::user()->type == '2')
                                    <a href="{{route('lectureDelete', $lecture->id)}}" class="btn btn-danger">Istrinti</a>
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
    <br>
    <br>
    @if (Auth::user()->type == '2')
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <form id="file-upload-form" action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                    <div class="file-input-wrap">
                        <h2>Ikelti Failus</h2>

                        <div class="col-md-6 mb-3">
                            <label for="course">Pamoka:</label>
                            <select name="lecture_id" class="form-control">

                                @foreach($lectures as $lecture)
                                        <option value="{{$lecture->id}}">{{$lecture->lecture_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <input type="file" name="failai[]" id="file" multiple>
                        <input type="submit" value="Įkelti" name="upload">
                    </div>

                </form>

            </div>

        </div>
    </div>
        @endif
    @endif

@endsection