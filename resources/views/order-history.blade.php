@extends('layouts.master')
@section('title', 'Giỏ hàng ')
@section('main')
<h2>Lịch sử đơn hàng</h2>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ngày đặt</th>
            <th>Trạng thái</th>
            <th>Tổng thiền</th>
            <th>Địa chỉ nhận hàng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $item)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$item->created_at}} <span class="badge badge-success"></span></td>
            <td>
                @if ($item->status == 0)
                <span>Chờ duyệt</span>
                @elseif($item->status == 1)
                <span>Đang giao</span>
                @elseif($item->status == 2)
                <span>Đã giao</span>
                @else
                <span>Đã hủy</span>
                @endif
            </td>
            <td>{{$item->TotalPrice}}</td>
            <td>{{$item->address}}</td>
            <td>
                <a href="" class="btn btn-primary btn-sm">Chi tiết</a>
                <a href="" class="btn btn-danger btn-sm">PDF</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>
<div class="text-center">
    <a href="{{ route('home.index') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
</div>

@stop()