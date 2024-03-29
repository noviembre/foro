@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
            <span>{{ $d->user->name }}, <b>{{ $d->user->points }}</b></span>

            @if($d->hasBestAnswer())
                <span class="btn btn-danger btn-xs pull-right">Closed</span>
            @else
                <span class="btn btn-success btn-xs pull-right">Open</span>
            @endif


            @if(Auth::id() == $d->user->id)
                @if(!$d->hasBestAnswer())
                    <a href="{{ route('discussion.edit', ['id' => $d->slug ])}}" class="btn btn-info btn-xs pull-right">edit</a>
                    @endif
            @endif


            @if($d->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch', ['id' => $d->id ])}}" class="btn btn-success btn-xs pull-right">unwatch</a>
            @else
                <a href="{{ route('discussion.watch', ['id' => $d->id ])}}" class="btn btn-danger btn-xs pull-right">watch</a>
            @endif

        </div>
        <div class="panel panel-body">
            <h4 class="text-center"><b>{{ $d->title }}</b></h4>
            <hr>
            <p class="text-center">
                {{ $d->contenido }}
            </p>
            <hr>

            @if($best_answer)
                <div class="text-center" style="padding: 40px;">
                    <h3 class="text-center" > BEST ANSWER</h3>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="{{ $best_answer->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span>{{ $best_answer->user->name }} - <b>{{ $best_answer->user->points }}</b></span>
                        </div>
                        <div class="panel-body">
                            {{ $best_answer->content }}

                        </div>

                    </div>

                </div>
            @endif

        </div>

        <div class="panel-footer">
           <span>
                    {{ $d->replies->count() }} Replies
                </span>
            <a href="{{ route('channel', ['slug' => $d->channel->slug]) }}" class="btn btn-info btn-xs pull-right">
                {{ $d->channel->title }}
            </a>

        </div>

    </div>

    @foreach($d->replies as $r)

        <div class="panel panel-default">
            <div class="panel-heading">

                <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                <span>{{ $r->user->name }} <b>{{ $d->user->points }}</b></span>

                @if(!$best_answer)
                    @if(Auth::id()== $d->user->id)
                        <a href="{{ route('discussion.best.answer', ['id' => $d->id  ]) }}" class="btn btn-primary pull-right btn-xs" style="margin-left: 10px"> Mark as best answer</a>

                     @endif


                @endif

                @if(Auth::id() == $r->user->id)
                    @if(!$r->$best_answer)
                        <a href="{{ route('reply.edit', ['id' => $r->id  ]) }}" class="btn btn-default pull-right btn-xs"> Edit</a>
                    @endif
                @endif

            </div>
            <div class="panel panel-body">

                <p class="text-center">
                    {{ $r->content }}
                </p>


            </div>

            <div class="panel-footer">
                @if($r->is_liked_by_auth_user())

                    <a href="{{ route('reply.unlike', ['id'=>$r->id ]) }}" class="btn btn-danger">
                        Unlike <span class="badge">{{ $r->likes->count() }}</span>
                    </a>

                @else
                    <a href="{{ route('reply.like', ['id'=>$r->id ]) }}" class="btn btn-success">
                        Like <span class="badge">{{ $r->likes->count() }}</span>
                    </a>

                @endif


            </div>

        </div>

    @endforeach

    <div class="panel panel-default">

        <div class="panel-body">

            @if(Auth::check())
                <form action="{{ route('discussion.reply',['id'=>$d->id ]) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="">Leave a replay...</label>
                        <textarea name="reply" id="reply" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Leave a Reply</button>

                    </div>

                </form>
            @else
                <div class="text-center">
                    <h2>Sign in to leave a reply</h2>
                </div>
            @endif
            
        </div>

    </div>
   

@endsection
