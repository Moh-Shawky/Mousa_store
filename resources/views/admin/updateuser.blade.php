<x-admin-layout>
    {{-- @dd($admin) --}}
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User information</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form method="POST" action='/updateuser'>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">User Name</label>
                            <input type="text" name="name" class="form-control" id="basic-default-fullname"
                                value="{{ $user->name }}" />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">User Email</label>
                            <input name="email" type="text" id="basic-default-phone"
                                class="form-control phone-mask" value="{{ $user->email }}" />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">User role</label>
                            <select name="role" id="role">
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
