<?php

namespace App\Http\Controllers;
//libreria
use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index()
    {
        //llamamos a todos los post y los ordenamos con una paginaioon
        $discussions = Discussion::orderBy('created_at','desc')->paginate(3);
        //y toodo esto le pasamos en un array
        return view('forum',['discussions' => $discussions]);
    }

    public function channel($slug)
    {

        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('discussions', $channel->discussions()->paginate(5));

    }


}
