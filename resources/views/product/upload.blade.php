@extends('layouts.admin')
@section('title', 'Trang chủ')
@section('main')


<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">Chọn ảnh</label>
        <input type="file" class="form-control" name="image" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection