<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(4);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags     = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'content'      => 'required',
            'category_id'  => 'required|integer',
            'thumbnail'    => 'nullable|image',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Post::imageUpdate($request);

        $post = Post::create($data);
        $post->tags()->sync($request->tags);

        session()->flash('success', 'Post succesful added!');
        return redirect()->route('posts.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'content'      => 'required',
            'category_id'  => 'required|integer',
            'thumbnail'    => 'nullable|image',
        ]);
        
        $post = Post::find($id);
        $data = $request->all();
        if($file = Post::imageUpdate($request, $post->thumbnail)){
            $data['thumbnail'] = $file;
        }
        
        $post->update($data);
        $post->tags()->sync($request->tags); /* tags - связь tags, метод */
        session()->flash('success', 'Post succesful updated!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->sync([]);
        Storage::delete($post->thumbnail);
        $post->delete();
        session()->flash('success', 'Post succesful deleted!');
        return redirect()->route('posts.index');
    }
}
