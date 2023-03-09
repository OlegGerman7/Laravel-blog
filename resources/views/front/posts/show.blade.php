@extends('front.layouts.layout')

@section('title', $post->title)

@section('content')
<div class="page-wrapper">
    <div class="blog-title-area">
        <ol class="breadcrumb hidden-xs-down">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.show', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a></li>
            <li class="breadcrumb-item active">{{ $post->title }}</li>
        </ol>

        <span class="color-yellow"><a href="{{ route('category.show', ['slug' => $post->category->slug]) }}" title="">{{ $post->category->title }}</a></span>

        <h3>{{ $post->title }}</h3>

        <div class="blog-meta big-meta">
            <small>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d F, Y') }}</small>
            <small><i class="fa fa-eye"></i>{{ $post->view }}</small>
        </div><!-- end meta -->
    </div><!-- end title -->

    <div class="single-post-media">
        <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
    </div><!-- end media -->

    <div class="blog-content">  
        {!! $post->content !!}
    </div><!-- end content -->

    <div class="blog-title-area">
        @if($post->tags->count())
            <div class="tag-cloud-single">
                <span>Tags</span>
                @foreach($post->tags as $tag)
                    <small><a href="{{ route('tag.show', ['slug' => $tag->slug]) }}" title="">{{ $tag->title }}</a></small>
                @endforeach
            </div>
        @endif

    </div><!-- end title -->

</div><!-- end page-wrapper -->
@endsection