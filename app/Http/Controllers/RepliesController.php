<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\Like;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {
        Like::create([

            'reply_id' => $id,
            'user_id' => Auth::id()

        ]);

        Session::flash('success', 'you like the reply');
        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('reply_id',$id)->where('user_id', Auth::id())->first();
        $like->delete();

        Session::flash('success', 'You unlike the reply');

        return redirect()->back();

    }

    public function best_answer($id)
    {
        $reply = Reply::find($id);
        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points += 100;
        $reply->user->save();

        Session::flash('success', 'Reply has been mark as the best answer');

        return redirect()->back();

    }

    public function edit($id)
    {
        return view('replies.edit',['reply' => Reply::find($id)]);

    }

    public function update($id)
    {
        $this->validate(request(), [

            'contenido' => 'required',

        ]);

        $reply = Reply::find($id);
        $reply->content = request()->contenido;
        $reply->save();

        Session::flash('success', 'Reply Updated');

        return redirect()->route('discussion',['slug' => $reply->discussion->slug]);

    }

}
