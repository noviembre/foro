@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a new channel</div>

                    <div class="panel-body">
                        <form action="{{ route('channels.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">
                                    Save
                                </button>

                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
