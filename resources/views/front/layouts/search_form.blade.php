<form class="form-inline" method="get" action="{{ route('search') }}">
    <input class="form-control mr-sm-2 @error('s') invalid @enderror" type="text" name="s" placeholder="Search...">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>