@extends('layouts.master')
@section('title', 'Giỏ hàng ')
@section('main')

<div class="row">
    <div class="col-md-4">

        <form action="" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$auth->name}}" placeholder="Input name">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email"  value="{{$auth->email}}" placeholder="Input email">
            </div>

            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone"  value="{{$auth->phone}}" placeholder="Input phone">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address"  value="{{$auth->address}}" placeholder="Input address">
            </div>

            <button type="submit" class="btn btn-primary">Order now</button>
        </form>

    </div>
    <div class="col-md-8">
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
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->quantity * $item->price}} đ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<hr>


@stop()