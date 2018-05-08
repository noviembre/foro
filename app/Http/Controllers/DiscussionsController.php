<?php

namespace App\Http\Controllers;
use App\Reply;
use Session;
use App\Discussion;
use Illuminate\Http\Request;
use Auth;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');
    }
    public function store()
    {
        //validar
        $r = request();
        $this->validate($r, [

            'channel_id' => 'required',
            'title' => 'required',
            'contenido' => 'required',

        ]);

        // guardando datos
        $discussion = Discussion::create([

            'title' => $r->title,
            'contenido' => $r->contenido,
            'channel_id' => $r->channel_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($r->title),

        ]);

        Session::flash('success', 'Discussion succesfully created');
        //redirigiendo a la pagina creada
        return redirect()->route('discussion', ['slug' => $discussion->slug ]);

    }

    public function show($slug)
    {
        return view('discussions.show')->with('d',Discussion::where('slug', $slug)->first());
    }


    public function reply($id)
    {
        $d = Discussion::find($id);

        $reply = Reply::create([
            'user_id' => $id,
            'discussion_id' => $id,
            'content' => request()->reply,
        ]);

        Session::flash('success', 'Replies to discussion');

        return redirect()->back();

    }


}
