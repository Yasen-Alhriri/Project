@extends('layouts.layout')


@section('title', 'Edit CategoryCourse')
@section('PageName', 'Edit Category Course')

@section('content')



    <form action="{{ route('categoryCourse.update', $category->id) }}" method="post" enctype="multipart/form-data" class="container mt-5">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{$category->name}}" required>
            <label for="floatingInput">Category Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" name="image" required>
            <label for="floatingInput">Category image</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('categoryCourse.index') }}" class="btn btn-secondary" aria-current="page">Back</a>

    </form>


@endsection
