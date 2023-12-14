<x-header />
<br> <br> <br>
<div class="reg">
    <div class="container ">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <form action="/create" method="POST" class="fh5co-form animate-box" data-animate-effect="fadeIn">
                    @csrf
                    <h2>Sign Up</h2>

                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            id="name" placeholder="Name" autocomplete="off">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            id="email" placeholder="Email" autocomplete="off">
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
                    <div class="form-group">
                        <label for="re-password" class="sr-only">Re-type Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="re-password"
                            placeholder="Re-type Password" autocomplete="off">
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
							<label for="remember"><input type="checkbox" id="remember"> Remember Me</label>
						</div> --}}
                    <div class="form-group">
                        <p>Already registered? <a href="/login">Sign In</a></p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign Up" class="btn btn-danger">
                    </div>
                </form>
                <!-- END Sign In Form -->

            </div>
        </div>
    </div>
</div>
<x-footer />
