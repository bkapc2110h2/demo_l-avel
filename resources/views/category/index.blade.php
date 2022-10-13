@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
@section('main')
<form action="{{ route('category.store') }}" method="POST" role="form">
    <legend>Form title</legend>
    @csrf
    <div class="form-group @error('name') has-error @enderror">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" placeholder="Input field">
        @error('name') <div>{!!$message!!}</div> @enderror
    </div>
    <div class="form-group">
        <label for="">Tên danh mục</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" value="0">
                Ẩn
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" checked>
                Hiển thị
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>

<form action="" method="get" class="form-inline" role="form">

    <div class="form-group">
        <input class="form-control" name="keyword" placeholder="Input keyword">
    </div>

    <div class="form-group">
      <select name="orderBy" class="form-control">
        <option value="">Mặc định</option>
        <option value="ASC">Name Tăng dần</option>
        <option value="DESC">Name giảm dần</option>
      </select>
      
    </div>


    <button type="submit" class="btn btn-primary">Lọc</button>
</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Total Product</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->status == 0 ? 'Ẩn' : 'Hiển thị'}}</td>
            <td>{{$cat->products->count()}}</td>
            <td>
                <form action="{{ route('category.destroy', $cat->id) }}" method="post">
                    @csrf @method("DELETE")
                    <button onclick="return confirm('Bạn có muốn xóa không?')"
                     class="btn btn-sm btn-danger">Xóa</button>
                     <a href="{{ route('category.edit', $cat->id) }}"
                     class="btn btn-sm btn-primary">Sửa</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
{{$cats->links()}}

@stop()