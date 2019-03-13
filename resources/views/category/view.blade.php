@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="view_category">
            <ul>
                <li>ID: </li>{{$category->id}}
                <li>Name: </li>{{$category->name}}
                <li>Description: </li>{{$category->description}}
            </ul>
        </div>
        <table class="table table-striped">
            <thead>
            <p>Posts:</p>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Content</td>
            </tr>
            </thead>
            <tbody>
                @foreach($category->posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('viewPost', ['id' => $post->id])}}">{{$post->name}}</a></td>
                    <td>{{$post->content}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
@endsection