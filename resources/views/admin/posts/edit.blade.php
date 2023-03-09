@extends('admin.layouts.layout')

@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Admin zone</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
        </ol>
        </div>
    </div>
    </div>
</section>
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update post:</h3>
        </div>
        <form method="post" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Excerpt</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" >{{ $post->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" >{{ $post->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        @foreach($categories as $k => $v)
                            @if($k == $post->category_id)
                                <option value="{{ $k }}" selected >{{ $v }}</option>
                            @else
                                <option value="{{ $k }}" >{{ $v }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="tags">Tags</label>
                  <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Select tag" style="width: 100%;">
                    @foreach($tags as $k => $v)
                        @if(in_array($k, $post->tags->pluck('id')->all()))
                            <option value="{{ $k }}" selected >{{ $v }}</option>
                        @else
                            <option value="{{ $k }}" >{{ $v }}</option>
                        @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="thumbnail" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                      </div>
                    </div>
                  </div>
                <div><img src="{{ $post->getImage() }}" width="200px"></div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>

@endsection('content')