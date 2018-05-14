@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Updating discussion</div>

        <div class="panel-body">

            <form action="{{ route('discussions.update',['id' => $discussion->id ]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">


                    <div class="form-group">

                        <label for="">Ask a Question</label>
                        <textarea name="contenido" id="contenido" class="form-control" rows="10">
                            {{ $discussion->contenido  }}
                        </textarea>

                    </div>

                    <div class="form-group">

                        <button class="btn btn-success pull-right" type="submit">Save</button>

                    </div>

                </div>


            </form>

        </div>
    </div>

@endsection
