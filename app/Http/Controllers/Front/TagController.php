<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($slug){
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->orderBy('id', 'desc')->paginate(2);
        return view('front.tags.show', compact('posts', 'tag'));
    }
}
