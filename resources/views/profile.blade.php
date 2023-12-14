<x-header>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a class="nav-link" href="home">Home</a>
        </li>
        <li class="nav-item ">
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
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
<div id="layoutSidenav">
    <br>
    <br>
    <br>
    <br>
    <div id="layoutSidenav_content">
        <div class="container">
            <div class="main-body">

                <!-- Breadcrumb -->
                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('assets/images/User profile - black vector image.jpeg') }}"
                                        alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p class="text-muted font-size-sm"></p>
                                        <!-- <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-primary">Message</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="/updateuser" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ auth()->user()->name }}">
                                            @error('name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="email"
                                                value="{{ auth()->user()->email }}">
                                            @error('email')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="role"
                                        value="{{ auth()->user()->role }}">
                                    <input type="hidden" class="form-control" name="id"
                                        value="{{ auth()->user()->id }}">

                                    {{-- <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="phone" value="">
                                        </div>
                                    </div> --}}


                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" name="update"
                                                value="Save Changes">
                                        </div>
                                <br><br><br>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <a href="/deleteuser/{{ auth()->user()->id }}"  class="filled-button">Delete my account</a>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer />
