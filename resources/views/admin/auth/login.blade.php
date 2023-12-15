<x-header />
<br> <br> <br>
<div class="reg">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">


                <!-- Start Sign In Form -->
                <form action="/auth" method="POST" class="fh5co-form animate-box" data-animate-effect="fadeIn">
                    @csrf
                    <h2>Sign In</h2>
                    <div class="form-group">
                        <label for="username" class="sr-only">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password" autocomplete="off">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                    <label for="remember"><input type="checkbox" id="remember"> Remember Me</label>
                </div> --}}
                    <div class="form-group">
                        <p>Not registered? <a href="/register">Sign Up</a></p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign In" class="btn btn-danger">
                    </div>
                </form>
                <!-- END Sign In Form -->

            </div>
        </div>
        <div class="row" style="padding-top: 60px; clear: both;">
        </div>
    </div>
</div>
<x-footer />
