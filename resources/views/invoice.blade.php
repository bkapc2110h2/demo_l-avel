<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
        }
    </style>
</head>

<body>
    <h1>CHI TIẾT ĐƠN HÀNG CỦA BẠN</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio modi reprehenderit beatae ullam corporis
        atque optio mollitia aliquid. Laboriosam tempore, reiciendis voluptatem cumque expedita dolor necessitatibus
        nulla quam. Blanditiis, voluptas.</p>

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
            @foreach($order->details($order->id) as $detail)
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
</body>

</html>