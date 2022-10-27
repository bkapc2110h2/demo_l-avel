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
            <td>{{number_format($item->TotalPrice)}} đ</td>
            <td>{{$item->address}}</td>
            <td>
                <a data-toggle="modal" href='#modal-{{$item->id}}' class="btn btn-primary btn-sm">Chi tiết</a>
                <a target="_blank" href="{{route('order.order_pdf', $item->id)}}" class="btn btn-danger btn-sm">PDF</a>
                <a target="_blank" href="{{route('order.order_pdf', $item->id)}}?download=true" class="btn btn-danger btn-sm">Tải PDF</a>


                <div class="modal fade" id="modal-{{$item->id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Chi tiết đơn hàng</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh SP</th>
                                    <th>Tên SP</th>
                                    <th>Giá mua</th>
                                    <th>Số lượng</th>
                                    <th>TT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->details($item->id) as $detail)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>
                                        <img style="width:50px !important" src="{{url('uploads')}}/{{$detail->image}}" alt="">
                                    </td>
                                    <td>{{$detail->name}}</td>
                                    <td>{{$detail->quantity}}</td>
                                    <td>{{$detail->price}}</td>
                                    <td>{{$detail->TotalPrice}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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