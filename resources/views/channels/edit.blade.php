@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
                    <div class="panel-heading">Edit channel</div>

                    <div class="panel-body">
                        <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">
                            {{ csrf_field() }}

                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <input value="{{ $channel->title }}" type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Update
                                </button>

                            </div>



                        </form>
                    </div>
                </div>

@endsection
