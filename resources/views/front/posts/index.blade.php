@extends('front.layouts.layout')

@section('title', 'Home')
@dd($number)

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
                    <small><a href="{{ route('category.show', ['slug' => $post->category->slug]) }}" title="">{{ $post->category->title }}</a></small>
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

@section('header')
<section id="cta" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 align-self-center">
                <h2>A digital marketing blog</h2>
                <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>
                <a href="#" class="btn btn-primary">Try for free</a>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="newsletter-widget text-center align-self-center">
                    <h3>Subscribe Today!</h3>
                    <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                    <form class="form-inline" method="post">
                        <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                        <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div>
    </div>
</section>
@endsection