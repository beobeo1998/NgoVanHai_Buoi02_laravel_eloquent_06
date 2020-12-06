@extends('layout.master')
@section('content')
@if(session('message'))
    <div class="col-lg-3 col-sm-3">
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    </div>
@endif
    <div class="col-lg-4 col-sm-6">
        <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" value="{{ $post->name }}" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title" aria-describedby="title" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" name="content" id="content" rows="3" required>{{ $post->content }}</textarea>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
