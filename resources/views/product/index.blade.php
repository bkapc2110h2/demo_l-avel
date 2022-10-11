@extends('layouts.master')
@section('title', 'Quản lý danh mục')
@section('main')
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
            <th>Category</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->cat->name}}</td>
            <td>{{$product->status == 0 ? 'Ẩn' : 'Hiển thị'}}</td>
            <td>
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
{{$products->links()}}

@stop()