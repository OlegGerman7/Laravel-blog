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
            <h3 class="card-title">Edit tag:</h3>
        </div>
        <form method="post" action="{{ route('tags.update', ['tag' => $tag->id]) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" value="{{ $tag->title }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>

@endsection('content')