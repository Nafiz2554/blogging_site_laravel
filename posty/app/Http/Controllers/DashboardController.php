<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $posts=Post::latest()->with(['user','likes'])->paginate(20);   
        return view('posts.index',[
            'posts'=>$posts
        ]);
        //return view('dashboard');
    }
}
