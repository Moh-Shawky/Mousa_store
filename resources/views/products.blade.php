<x-header>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a class="nav-link" href="home">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="products">Our Products
            <span class="sr-only">(current)</span>
        </a>
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
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>new arrivals</h4>
                    <h2>sixteen products</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="products-container">
    <div class="products-list">
        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filters">
                            <ul>
                                <li class="active" data-filter="*">All Products</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="filters-content">
                            <div class="row grid">
                                @foreach ($products as $product)
                                    <div class="col-md-4">
                                        <div class="product-item">
                                            <img width="150" height="260" src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/Mansa Musa.jpeg') }}"
                                                alt="">
                                            <div class="down-content">
                                                <h4>{{ $product->name }}</h4>
                                                <h6>{{ $product->price }}</h6>
                                                <p>{{ $product->description }}.</p>
                                                <span>Rate: {{$product->rate}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination-container col-md-12 mt-6 p-4 d-flex justify-content-center">
        <ul class="pages">
            @if ($products->onFirstPage())
                <li class="pagination-item disabled"><span class="pagination-link">&laquo;</span></li>
            @else
                <li class="pagination-item"><a href="{{ $products->previousPageUrl() }}" class="pagination-link"
                        rel="prev">&laquo;</a></li>
            @endif

            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if ($page == $products->currentPage())
                    <li class="pagination-item active"><span class="pagination-link">{{ $page }}</span>
                    </li>
                @else
                    <li class="pagination-item"><a href="{{ $url }}"
                            class="pagination-link">{{ $page }}</a></li>
                @endif
            @endforeach

            @if ($products->hasMorePages())
                <li class="pagination-item"><a href="{{ $products->nextPageUrl() }}" class="pagination-link"
                        rel="next">&raquo;</a></li>
            @else
                <li class="pagination-item disabled"><span class="pagination-link">&raquo;</span></li>
            @endif
        </ul>
    </div>
</div>


<x-footer />
