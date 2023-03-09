<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>
    @if($categories->count())
        @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
        </li>
        @endforeach
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('show.form') }}">Contact us</a>
    </li>
</ul>