@extends('layouts.master')
@section('title', 'Sửa danh mục')
@section('main')
<form action="{{ route('category.update', $cat->id) }}" method="POST" role="form">
    <legend>Form title</legend>
    @csrf @method('PUT')
    <div class="form-group @error('name') has-error @enderror">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="{{$cat->name}}">
        @error('name') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group">
        <label for="">Tên danh mục</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" {{$cat->status == 0 ? 'checked' : ''}} value="0">
                Ẩn
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" {{$cat->status == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>
@stop()