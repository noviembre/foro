@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Channels</div>

                    <table class="table table-responsive">
                        <thead>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
                        @foreach($channels as $channel)
                            <tr>

                                <td>{{$channel->title}}</td>
                                <td>
                                    <a href="{{route('channels.edit',['channel' => $channel->id ])}}" class="btn btn-info btn-xs">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('channels.destroy',['channel' => $channel->id ])}}" method="post">
                                        {{ csrf_field() }}

                                        {{ method_field('DELETE') }}
                                        <button href="" class="btn btn-danger btn-xs" type="submit">Destroy</button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
