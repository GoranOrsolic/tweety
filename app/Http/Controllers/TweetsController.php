<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;


class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()
                ->user()
                ->timeline()
                
        ]);
    }

    public function destroy($user_id)
      {     
        $id = current_user();
        $tweets = Tweet::find($user_id);

        if (Auth::user() != $tweets->user) {
            return redirect()->route('home');

        }
         $tweets->delete(); 

        return redirect()->route('home');
       
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'body' => 'required|max:255',
            'slika' => ['file'],
        ]);

        if (isset($attributes['slika'])) {
           
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'slika' => $attributes['slika']->store('public'),
            
        ]);

        }

        elseif (! isset($attributes['slika'])) {
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
             ]);
        }

        return redirect()->route('home');
    }

}