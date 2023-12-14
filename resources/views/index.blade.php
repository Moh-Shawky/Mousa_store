<x-header>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="home">Home
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="products">Our Products</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="about">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact">Contact Us</a>
        </li>



        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/profile">Profile</a>
                @if (auth()->user()->role == 2)
                    <a class="dropdown-item" href="/admin">Dashboard</a>
                @endif
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </li>
        @else
            <li class="nav-item">
                <div class="col-md-4">
                    <a href="/login" class="filled-button">Login</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="col-md-4">
                    <a href="/register" class="filled-button">Register</a>
                </div>
            </li>
        @endauth
    </ul>

</x-header>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Best Offer</h4>
                <h2>New Arrivals On Sale</h2>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h4>Flash Deals</h4>
                <h2>Get your best products</h2>
            </div>
        </div>
        <div class="banner-item-03">
            <div class="text-content">
                <h4>Last Minute</h4>
                <h2>Grab last minute deals</h2>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products">view all products <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="product-item">
                        <img width="170" height="280"
                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/Mansa Musa.jpeg') }} ">
                        <div class="down-content">
                            <h4>{{ $product->name }}</h4>
                            <h6>{{ $product->price }}</h6>
                            <p>{{ $product->description }}.</p>
                            <span>Rate: {{ $product->rate }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="best-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>About MOUSA</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left-content">
                    <h4>Looking for the best products?</h4>
                    <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This
                            template</a> is free to use for your business websites. However, you have no permission to
                        redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow"
                            href="https://templatemo.com/contact">Contact us</a> for more info.</p>
                    <ul class="featured-list">
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Consectetur an adipisicing elit</a></li>
                        <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                        <li><a href="#">Corporis, omnis doloremque</a></li>
                        <li><a href="#">Non cum id reprehenderit</a></li>
                    </ul>
                    {{-- <a href="about" class="filled-button">Read More</a> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-image">
                    <img src="assets/images/feature-image.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Creative &amp; Unique <em>MOUSA</em> Products</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                author nulla.</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="filled-button">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer />
