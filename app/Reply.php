<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [

        'content',
        'user_id',
        'discussion_id',
    ];

    public function discussion()
    {
        return $this->belongsTo('App\discussion');

    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public function likes()
    {
        return $this->hasMany('App\Like');

    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        // creano arraylimpio
        $likers = array();

        //para cada uno de los likes
        //para este Reply accedemos a los likes
        foreach ($this->likes as $like):
        //mostrar los "likes" y el nombre del usuario ke les gusta este post
            array_push($likers, $like->user_id);

        endforeach;

        //si en este arra estan los ke le dieron like...devuelva
        if(in_array($id, $likers))
        {
            return true;
        }
        else
        {
            return false;
        }


    }
}
