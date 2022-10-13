@extends('layouts.admin')
@section('title', 'Sửa danh mục')
@section('main')
<form action="{{ route('category.update', $category->id) }}" method="POST" role="form">
    <legend>Form title</legend>
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="form-group @error('name') has-error @enderror">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}">
        @error('name') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group">
        <label for="">Tên danh mục</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" {{$category->status == 0 ? 'checked' : ''}} value="0">
                Ẩn
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" {{$category->status == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>
@stop()