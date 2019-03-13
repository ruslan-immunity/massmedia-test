@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Posts</h3>
        <div class="form-group">
            <a href="{{route('createPost')}}" id="sendComment" class="btn btn-success text-white col-2">Create post</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Content</td>
                <td>Category</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->category()->first()->name}}</td>
                    <td class="row">
                        <div class="form-group">
                            <a href="{{route('updatePost', ['id' => $post->id])}}" class="btn btn-primary text-white">Update</a>
                        </div>
                        <div class="form-group">
                            <form method="post" action="{{route('deletePost', ['id' => $post->id])}}">
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection