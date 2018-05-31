@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <table class="table">
                        <tr>
                            <th></th>
                            <th>Zinutes</th>
                        </tr>
                        @foreach($messages as $message)
                            @if(in_array($message->group_id, $groups))
                            <tr>
                                <td></td>
                                <td>
                                    {!! $message->message !!}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                    </table>
                    <a href="{{route('groups.index')}}"class="btn btn-warning">Rodyti grupe</a>
                </div>
            </div>
        </div>
    </div>

@endsection