<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

use App\Services\GetRandomNumber;

//use App\Facades\GetNumber;

class HomeController extends Controller
{
    public function index(GetRandomNumber $obj){
        //$obj = new GetRandomNumber();
        $number = $obj->getNumber();
        //$number = GetNumber::getNumber();
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate('2');
        return view('front.posts.index', compact('posts', 'number'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->view +=1;
        $post->update();
        return view('front.posts.show', compact('post'));
    }
}
