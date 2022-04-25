@extends('layouts.app')

@section('title')Index @endsection

@section('content')
<div class="text-center">
    <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $posts as $post)
        <tr>
            <td>{{ $post['id'] }}</th>
            <td>{{ $post['title'] }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->slug }}</td>
            <td style="width: 10%">
                @if($post->image)
                <img class="img-fluid" src="/{{ $post->image }}" alt="">
                @endif
            </td>
            <td>{{ $post['created_at'] }}</td>
            <td>
                <a href="{{ route('posts.view', ['post' => $post['id']]) }}" class="btn btn-info">View</a>
                <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="btn btn-primary">Edit</a>
                <form style="display:inline-block;" method="POST" action="{{ route('posts.destory',['post' => $post['id']])}}">
                @method("DELETE")
                @csrf
               <button onclick="return confirm('Do you want to delete this post?')" class="btn btn-danger">Delete</button>
               </form>
               
            </td>
        </tr>
            
        @endforeach
        
            <div class="paginate">
                {{$posts->links()}}
             </div>

       
    </tbody>
            
</table>
@endsection
