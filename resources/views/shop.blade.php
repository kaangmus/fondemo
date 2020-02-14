@extends('layouts.eco')
@section('content')
<section class="pt-5 pb-5 bg-dark inner-header">
    <section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mt-0 mb-3 text-white">SHOP</h1>
                <div class="breadcrumbs">
                    <p class="mb-0 text-white"><a class="text-white" href="/">Home</a>  /  <span
                            class="text-success">SHOP</span></p>
                </div>
            </div>
        </div>
    </div>
    </section>
</section>


{{-- nav bar --}}
<header class="section-header bg-dark">
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-6 col-sm-6">
                    <form action="#" class="search-wrap">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            <a href="#" class="icontext">
                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i
                                        class="fa fa-shopping-cart"></i></div>
                                <div class="text-wrap">
                                    <small>3 items</small>
                                </div>
                            </a>
                        </div>
                        @guest
                        <div class="widget-header">
                            <a href="{{ route('login') }}" class="ml-3 icontext">
                                <div class="icon-wrap icon-xs bg-primary round text-white"><i class="fa fa-user"></i>
                                </div>
                                <div class="text-wrap"><span>Login</span></div>
                            </a>
                        </div>
                        <div class="widget-header">
                            <a href="{{ route('register') }}" class="ml-3 icontext">
                                <div class="icon-wrap icon-xs bg-success round text-white"><i class="fa fa-user"></i>
                                </div>
                                <div class="text-wrap"><span>Register</span></div>
                            </a>
                        </div>
                        @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-second dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->full_name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
   
</header>
<!-- ========================= Blog ========================= -->
<section class="section-content padding-y-sm bg">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg">Featured Categories</h4>
        </header>
        <div class="row">
            <div class="col-md-4">
                <div class="card-banner" style="height:250px; background-image: url('images/posts/1.jpg');">
                    <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h5 class="card-title">Primary text as title</h5>
                            <a href="#" class="btn btn-warning btn-sm"> View All </a>
                        </div>
                    </article>
                </div>
                <!-- card.// -->
            </div>
            <div class="col-md-4">
                <div class="card-banner" style="height:250px; background-image: url('images/posts/2.jpg');">
                    <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h5 class="card-title">Primary text as title</h5>
                            <a href="#" class="btn btn-warning btn-sm"> View All </a>
                        </div>
                    </article>
                </div>
                <!-- card.// -->
            </div>
            <div class="col-md-4">
                <div class="card-banner" style="height:250px; background-image: url('images/posts/3.jpg');">
                    <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <h5 class="card-title">Primary text as title</h5>
                            <a href="#" class="btn btn-warning btn-sm"> View All </a>
                        </div>
                    </article>
                </div>
                <!-- card.// -->
            </div>

        </div>
    </div>
</section>
<!-- ========================= Blog .END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg">
    <div class="container">

        <header class="section-heading heading-line">
            <h4 class="title-section bg">FEATURED PRODUCTS</h4>
        </header>
        <div class="row">
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/1.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Another name of item</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/2.jpg"> </div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Good product</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Product name goes here</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
        </div>
        <!-- row.// -->

    </div>
    <!-- container .//  -->
</section>

<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Recently Added</h4>
        </header>
        <div class="row">
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/1.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Another name of item</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/2.jpg"> </div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Good product</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Product name goes here</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <!-- col // -->
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Product name goes here</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
        </div>
        <!-- row.// -->
        <div class="row">
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/1.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Another name of item</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/2.jpg"> </div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Good product</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Product name goes here</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <!-- col // -->
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Product name goes here</h4>
                        <p class="desc">Some small description goes here</p>
                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <div class="label-rating">132 reviews</div>
                            <div class="label-rating">154 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Add To Cart</a>
                        <div class="price-wrap h5">
                            <span class="price-new">$1280</span> <del class="price-old">$1980</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
        </div>
        <!-- row.// -->

    </div>
    <!-- container // -->
</section>



@endsection

