@extends('front.layouts.layout')

@section('title', 'Contact')

@section('content')

<div class="container">
    @if(session()->has('success'))
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-success mt-3">
              {{ session('success') }}
            </div>
          </div>
        </div>
      </div>
    @endif
    <h2>Contact us</h2>
    <form method="post" action="{{ route('sent.form') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="text">Subject</label>
            <input name="subject" type="text" class="form-control" id="text">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" id="message" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input name="file" type="file" class="form-control-file" id="file">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>

@endsection

