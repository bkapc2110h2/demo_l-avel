@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
@section('main')

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <legend>Form thêm mới sản phẩm</legend>

    <div class="form-group">
        <label for="">danh mục sản phẩm</label>

        <select name="category_id" class="form-control">
            <option value="">Chọn danh mục</option>
            @foreach($cats as $cat)
            <option value="{{$cat->id}}" {{old('category_id') == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
            @endforeach
        </select>
        @error('category_id') <div>{!!$message!!}</div> @enderror
    </div>


    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" placeholder="Input tên sp" value="{{ old('name') }}">
        @error('name') <div>{!!$message!!}</div> @enderror
    </div>


    <div class="form-group">
        <label for="">Giá sản phẩm</label>
        <input type="text" class="form-control" name="price" placeholder="Input tên sp" value="{{ old('price') }}">
        @error('price') <div>{!!$message!!}</div> @enderror
    </div>

    <div class="form-group">
        <label for="">Giá KM</label>
        <input type="text" class="form-control" name="sale_price" placeholder="Input tên sp" value="{{ old('sale_price') }}">
        @error('sale_price') <div>{!!$message!!}</div> @enderror
    </div>

    <div class="form-group">
        <label for="">Trạng thái</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0" {{old('status') == 0 ? 'checked' : ''}}>
                Ẩn
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" {{old('status') == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="">Mô tả</label>
        <input type="text" class="form-control" name="content" placeholder="Input tên sp" value="{{ old('content') }}">
        @error('content') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group">
        <label for="">Ảnh đại diện</label>
        <input type="file" class="form-control" name="upload" />
        @error('upload') <div>{!!$message!!}</div> @enderror
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>


@stop()

