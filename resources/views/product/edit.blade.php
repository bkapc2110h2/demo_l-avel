@extends('layouts.admin')
@section('title', 'Cập nhật sản phẩm')
@section('main')

<form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <legend>Form thêm mới sản phẩm</legend>

    <div class="form-group">
        <label for="">danh mục sản phẩm</label>

        <select name="category_id" class="form-control">
            <option value="">Chọn danh mục</option>
            @foreach($cats as $cat)
            <option value="{{$cat->id}}" {{$product->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
            @endforeach
        </select>
        @error('category_id') <div>{!!$message!!}</div> @enderror
    </div>


    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" placeholder="Input tên sp" value="{{ $product->name }}">
        @error('name') <div>{!!$message!!}</div> @enderror
    </div>


    <div class="form-group">
        <label for="">Giá sản phẩm</label>
        <input type="text" class="form-control" name="price" placeholder="Input tên sp" value="{{ $product->price }}">
        @error('price') <div>{!!$message!!}</div> @enderror
    </div>

    <div class="form-group">
        <label for="">Giá KM</label>
        <input type="text" class="form-control" name="sale_price" placeholder="Input tên sp" value="{{ $product->sale_price }}">
        @error('sale_price') <div>{!!$message!!}</div> @enderror
    </div>

    <div class="form-group">
        <label for="">Trạng thái</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0" {{$product->status == 0 ? 'checked' : ''}}>
                Ẩn
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" {{$product->status == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="">Mô tả</label>
        <input type="text" class="form-control" name="content" placeholder="Input tên sp" value="{{ $product->content }}">
        @error('content') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group">
        <label for="">Ảnh đại diện</label>
        <input type="file" class="form-control" name="upload" />
        @error('upload') <div>{!!$message!!}</div> @enderror

        <hr>
        <img src="{{url('uploads')}}/{{$product->image}}" width="250">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>


@stop()

