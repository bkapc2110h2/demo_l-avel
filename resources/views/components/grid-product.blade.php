<h3>{{$title}}</h3>



<div class="row product-list">
    @foreach($products as $item)
    <div class="col-md-3 pro-item">
        <div class="hot">
            <span>HOT</span>
        </div>
        <div class="sale green">
            <div class="x-sale">
                <s>{{$item->price}}</s>
                <span>{{$item->sale_price}}</span>
            </div>
        </div>
        <div class="card text-center">
            <div class="pro-image">
                <img class="card-img-top" src="{{url('uploads')}}/{{$item->image}}" alt="">
            </div>
            <div class="card-body text-center">
                <h4 class="card-title">
                    <a
                        href="{{ route('home.productDetail', ['slug' => Str::slug($item->name), 'product' => $item->id]) }}">{{$item->name}}</a>
                </h4>

                <div>
                    <a href="{{ route('cart.add', $item->id) }}" class="btn btn-success btn-sm">Thêm giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>