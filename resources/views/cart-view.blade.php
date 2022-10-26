@extends('layouts.master')
@section('title', 'Giỏ hàng ')
@section('main')
<div class="row">
    <div class="col-md-6">
        <h2>Giỏ hàng của quý khách</h2>
    </div>
    <div class="col-md-6">
        <h2>Total Amount: {{$cart->totalAmount}}</h2>
    </div>
</div>
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
    @foreach($cart->items as $item)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>
                <img src="{{url('uploads')}}/{{$item->image}}" style="width: 60px !important">
            </td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}} đ</td>
            <td>
                <form action="{{ route('cart.update', $item->id)}}" method="get">
                
                <input type="number" name="quantity" value="{{$item->quantity}}" style="width:60px; text-align:center">
                    <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                </form>
                

            </td>
            <td>{{$item->quantity * $item->price}} đ</td>
            <td>
                <a href="{{ route('cart.remove', $item->id) }}"
                onclick="return confirm('Bạn chắc chưa?')" class="btn btn-danger btn-sm">&times;</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr>
<div class="text-center">
    <a href="{{ route('home.index') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
    <a href="{{ route('cart.clear') }}" onclick="return confirm('Bạn chắc chưa?')" class="btn btn-danger">Xóa giỏ hàng</a>
    <a href="{{ route('order.checkout') }}" class="btn btn-success">Đặt hàng</a>
</div>

@stop()