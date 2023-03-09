<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\searchRequest;

class SearchController extends Controller
{
    public function index(searchRequest $request){
        // $validated = $request->validate([
        //     's'     => 'required',
        // ]);

        $s = $request->s;
        $posts = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(2);
        return view('front.layouts.search', compact('posts', 's'));
    }
}
