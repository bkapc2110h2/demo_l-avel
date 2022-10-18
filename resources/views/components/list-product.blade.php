
<h3>{{$title}}</h3>

<div id="product" class="owl-carousel owl-theme product-list">
    @foreach($products as $item)
    <div class="item pro-item">
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
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Body</p>
            </div>
        </div>
    </div>

    @endforeach

</div>