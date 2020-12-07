@extends('layout.master')
@section('content')
@if(session('message'))
    <div class="col-lg-3 col-sm-3">
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    </div>
@endif
<div class="col-lg-8 col-sm-6">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">active</th>
                <th scope="col">Created_at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($posts))
            @php
                $i=1;
            @endphp
                @foreach ($posts as $item)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->active }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('post.edit',$item->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ route('post.delete',$item->id) }}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                </tr>
                @endforeach
        @endif
        </tbody>
      </table>
</div>
@endsection
