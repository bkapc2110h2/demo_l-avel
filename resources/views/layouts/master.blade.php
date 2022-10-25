<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owlCarousel/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="plugins/owlCarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('')}}/css/style.css">
</head>

<body>
    <nav class="my-menu fixed-top navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.about') }}">Liên hệ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Store</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            @foreach($global_cats as $cat)
                            <a class="dropdown-item" href="{{route('home.category', ['category'=> $cat->id,'slug' => Str::slug($cat->name)])}}">{{$cat->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Tin tức</a>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="login.html">Đăng nhập</a>
                            <a class="dropdown-item" href="register.html">Đăng ký</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    <a class="btn btn-success my-2 my-sm-0 ml-3" href="">Cart ({{ $cart->totalQuantity }})</a>
                </form>
            </div>
        </div>
    </nav>
    <div id="banner" class="carousel slide mt-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#banner" data-slide-to="0" class="active"></li>
            <li data-target="#banner" data-slide-to="1"></li>
            <li data-target="#banner" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRad9iQW3A5_jTjgwup6g-unmgOINKET1npkBZVS5bAeKljujSs7gq-7AlmxrYrhhHWkw&usqp=CAU"
                    alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Title</h3>
                    <p>Description</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRad9iQW3A5_jTjgwup6g-unmgOINKET1npkBZVS5bAeKljujSs7gq-7AlmxrYrhhHWkw&usqp=CAU"
                    alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Title</h3>
                    <p>Description</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRad9iQW3A5_jTjgwup6g-unmgOINKET1npkBZVS5bAeKljujSs7gq-7AlmxrYrhhHWkw&usqp=CAU"
                    alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Title</h3>
                    <p>Description</p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container py-5">
        @if (Session::has('no'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('no')}}!</strong>
        </div>
        @endif

        @if (Session::has('yes'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('yes')}}!</strong>
        </div>
        @endif

        @yield('main')
        
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card text-center">
                                <div class="pro-image">
                                    <img class="card-img-top"
                                        src="https://cf.shopee.vn/file/29f9d5736dd676601a4c41be4155b4b5" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2>Product naem 123</h2>
                            <h4>Giá: 500,0000 đ</h4>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis commodi at, odio
                                aspernatur rerum maxime ex, ipsa hic sint eveniet qui accusantium sequi culpa voluptatem
                                accusamus neque dignissimos, ipsam aut.
                            </p>

                            <form action="" method="POST" class="form-inline" role="form">

                                <div class="form-group">
                                    <label class="sr-only" for="">label</label>
                                    <input type="email" class="form-control" id="" placeholder="Input field">
                                </div>



                                <button type="submit" class="btn btn-primary">Add To Cart</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="plugins/owlCarousel/owl.carousel.min.js"></script>

    <script src="{{url('')}}/js/owl-carousel.js"></script>
</body>

</html>