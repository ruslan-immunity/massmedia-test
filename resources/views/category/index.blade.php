@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <h3>Categories</h3>
            <div class="form-group">
                <a href="{{route('createCategory')}}" id="sendComment" class="btn btn-success text-white col-2">Create category</a>
            </div>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td class="row">
                        <div class="form-group">
                            <a href="{{route('updateCategory', ['id' => $category->id])}}" class="btn btn-primary text-white">Update</a>
                        </div>
                        <div class="form-group">
                            <form method="post" action="{{route('deleteCategory', ['id' => $category->id])}}">
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