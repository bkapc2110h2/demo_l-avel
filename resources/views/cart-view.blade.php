@extends('layouts.master')
@section('title', 'Giỏ hàng ')
@section('main')
<h2>Giỏ hàng của quý khách</h2>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>QUantity</th>
            <th>Sub Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($carts as $item)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>
                <img src="{{url('uploads')}}/{{$item->image}}" style="width: 60px !important">
            </td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}} đ</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->quantity * $item->price}} đ</td>
            <td>
                <a href="" class="btn btn-danger btn-sm">&times;</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr>
<div class="text-center">
    <a href="" class="btn btn-primary">Tiếp tục mua hàng</a>
    <a href="" class="btn btn-danger">Xóa giỏ hàng</a>
    <a href="" class="btn btn-success">Đặt hàng</a>
</div>

@stop()