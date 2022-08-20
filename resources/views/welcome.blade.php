<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Popular Products Section Using HTML , CSS , Bootstrap</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="/template/css/style.css">

</head>


<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Extratech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('welcome')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <section class="section-carousel">
        <div class="container">
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        @php $i = 1; @endphp

                        @foreach ($products as $product)
                        <div class="carousel-item {{$i == '1' ? 'active':''}}">
                            @php $i++; @endphp

                            <img class="d-block w-100" src="{{ url('public/template/img/'.$product->image) }}"
                                alt="Slider image">
                        </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <section class="section-products">

        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>

                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($topseller as $product)
                <!-- Single Product -->

                <div class="col-md-6 col-lg-4 col-xl-3">

                    <div id="product-1" class="single-product">


                        <div class="part-1"
                            style="background: url({{asset('public/template/img/'.$product->image)}})  no-repeat center;">

                            <ul>

                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                            </ul>

                        </div>
                        <div class="part-2">

                            <h4 class="product-title text-center">{{$product->name}}</h4>
                            <h4 class="product-price text-center">${{$product->price}}</h4>



                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center text-center ">
                <div class="col-md-8 col-lg-6 ">
                    <div class="header">
                        <h3>Top Selling Products</h3>

                    </div>
                </div>
            </div>
            <div class="row mb-4">
                @foreach ($featured as $product)
                <!-- Single Product -->

                <div class="col-md-6 col-lg-4 col-xl-3">

                    <div id="product-1" class="single-product">


                        <div class="part-1"
                            style="background: url({{asset('public/template/img/'.$product->image)}})  no-repeat center;">

                            <ul>

                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                            </ul>

                        </div>
                        <div class="part-2">

                            <h3 class="product-title text-center">{{$product->name}}</h3>
                            <h3 class="product-price text-center">${{$product->price}}</h3>



                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
    <!-- partial -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>