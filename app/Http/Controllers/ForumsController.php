<?php

namespace App\Http\Controllers;
//libreria
use Auth;
use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
        //llamamos a todos los post y los ordenamos con una paginaioon
       // $discussions = Discussion::orderBy('created_at','desc')->paginate(3);
        //y toodo esto le pasamos en un array
        switch (request('filter'))
        {
            case 'me':
                $result = Discussion::where('user_id', Auth::id())->paginate(3);
                break;

            case 'solved':

                $answered = array();
                foreach (Discussion::all() as $d)
                {
                    if($d->hasBestAnswer())
                    {
                        array_push($answered, $d);
                    }
                }

                $result = new Paginator($answered, 3);
                break;
            case 'unsolved':
                $noanswered = array();
                foreach (Discussion::all() as $d)
                {
                    if(!$d->hasBestAnswer())
                    {
                        array_push($noanswered, $d);
                    }
                }

                $result = new Paginator($noanswered, 3);
                break;

            default:
                //x si tipeas mal y no hay filtro para eso
                $result = Discussion::orderBy('created_at','desc')->paginate(3);
                break;
        }
        return view('forum',['discussions' => $result]);
    }

    public function channel($slug)
    {

        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('discussions', $channel->discussions()->paginate(5));

    }


}
