@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">


            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Prideti </h4>
                <form method="POST" action="{{route('users.store')}}">

                    @csrf

                    <div class="col-md-6 mb-3">
                        <label for="grupe">Grupe:</label>
                        <select name="group_id" class="form-control">

                            @foreach($groups as $group)

                                <option value="{{$group->id}}">{{$group->group_name}}</option>

                            @endforeach

                        </select>
                    </div>

                    <table class="table table-hover">
                        <tr>

                            <th>Studentu sarasas</th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->type == 1)
                                <tr>
                                    <td>
                                         <input type="checkbox" name="user_id[]" value="{{$user->id}}">&nbsp;&nbsp;&nbsp;{{$user->name}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <table class="table table-hover">
                        <tr>

                            <th>Destytoju sarasas</th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->type == 2)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="user_id[]" value="{{$user->id}}">&nbsp;&nbsp;&nbsp;{{$user->name}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>




                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Išsaugoti</button>
                </form>
            </div>
        </div>
    </div>

@endsection