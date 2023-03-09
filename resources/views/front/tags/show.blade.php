@extends('front.layouts.category_layout')

@section('title', $tag->title)

@section('page-title')
<div class="page-title db">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>{{ $tag->title }}</h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $tag->title }}</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="blog-custom-build">
        @foreach($posts as $post)
            <div class="blog-box wow fadeIn">
                <div class="post-media">
                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}" title="">
                        <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div>
                        <!-- end hover -->
                    </a>
                </div>
                <!-- end media -->
                <div class="blog-meta big-meta text-center">
                    <h4><a href="{{ route('post.show', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>
                    {!! $post->description !!}
                    <small><a href="{{ route('tag.show', ['slug' => $tag->slug]) }}" title="">{{ $tag->title }}</a></small>
                    <small>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d F, Y') }}</small>
                    <small><i class="fa fa-eye"></i>{{ $post->view }}</small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->
            <hr class="invis">
        @endforeach

    </div>
</div>

<hr class="invis">

<div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            {{ $posts->links() }}
        </nav>
    </div><!-- end col -->
</div><!-- end row -->
@endsection