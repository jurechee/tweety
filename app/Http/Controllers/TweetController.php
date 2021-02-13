<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {

        $atributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $atributes['body'] 
        ]);

        return redirect('/index');
    }
}
