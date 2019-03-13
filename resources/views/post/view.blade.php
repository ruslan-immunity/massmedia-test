@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="view_post">
            <ul>
                <li>ID:</li>{{$post->id}}
                <li>Name:</li>{{$post->name}}
                <li>Content:</li>{{$post->content}}
                <li>File:</li><img src="{{ asset('uploads/files/'.$post->file)}}" alt="">
            </ul>
        </div>
        <p>Comments</p>
        <div id="list_comments">
            @foreach($post->comments as $comment)
                <div class="p-2 mb-2 bg-secondary text-white col-6">
                    <p>{{$comment->created_at}}<br>Автор: {{$comment->author}}</p>
                    <p>{{$comment->content}}</p>
                </div>
            @endforeach
        </div>
            <label>Add comment... </label>
            <div class="form-group">
                <label for="author">Name Author:</label>
                <input type="text" class="form-control col-6" name="author" />
            </div>
            <div class="form-group">
                <label for="author">Comment:</label>
                <textarea name="comment" class="form-control col-6" id="{{$post->id}}" cols="30"></textarea>
            </div>
            <div class="form-group">
                <button id="sendComment" class="btn btn-primary col-2">Send</button>
            </div>

    </div>
@endsection
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/comment.js') }}"></script>