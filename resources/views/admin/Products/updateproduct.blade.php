<x-admin-layout>
    {{-- @dd($course) --}}
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Product information</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form method="POST" action='/dashboard/updateproduct' enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Product Name</label>
                            <input type="text" name="name" class="form-control" id="basic-default-fullname"
                                value="{{ $product->name }}" />
                                @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Product Description</label>
                            <input type="text" name="description" class="form-control" id="basic-default-company"
                                value="{{ $product->description }}" />
                                @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">price</label>
                            <input name="price" type="text" id="basic-default-phone"
                                class="form-control phone-mask" value="{{ $product->price }}" />
                                @error('peice')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                        <div class="mb-3">
                            <div class="card h-100">
                                <img width="280" height="180"
                            src="{{ $product->image ? asset('storage/' . $product->image) : '' }} " alt="NO Image">
                            <input name="image" type="file" id="basic-default-phone"
                            class="form-control"/>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
