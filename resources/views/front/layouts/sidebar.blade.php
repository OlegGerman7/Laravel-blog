<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Popular Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                @if($popular_posts->count())
                    @foreach($popular_posts as $post)
                        <a href="{{ route('post.show', ['slug' => $post->slug]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="{{ $post->getImage() }}" alt="" class="img-fluid float-left">
                                <h5 class="mb-1">{{ $post->title }}</h5>
                                <small>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d F, Y') }}</small>
                                <small><i class="fa fa-eye"></i>{{ $post->view }}</small>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Categories</h2>
        <div class="link-widget">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->title }} <span>({{ $category->posts_count }})</span></a></li>
                @endforeach
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->