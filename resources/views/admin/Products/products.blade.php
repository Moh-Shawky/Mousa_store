<x-admin-layout>

  <div class="card">
    <a href="/dashboard/createproduct"><button type="submit" class="btn btn-primary">Add new Product</button></a>
    <h5 class="card-header">Products Table</h5>
    <div class="card-body">
      {{-- <div class="table-responsive text-nowrap"> --}}
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product</th>
              <th>about</th>
              <th>price</th>
              <th>rating</th>
              <th>Actions</th>
            </tr>
          </thead>
          @foreach ($products as $product)

          <tbody>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->name}}</strong>
            </td>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->description}}</strong>
            </td>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->price}}</strong>
            </td>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->rate}}</strong>
            </td>
            <td>
              <div class="dropdown">
                <button
                  type="button"
                  class="btn p-0 dropdown-toggle hide-arrow"
                  data-bs-toggle="dropdown"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/dashboard/editproduct/{{$product->id}}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
                  <a class="dropdown-item" href="/dashboard/deleteproduct/{{$product->id}}"
                    ><i class="bx bx-trash me-1"></i> Delete</a
                  >
                </div>
              </div>
            </td>
      </tbody>
      @endforeach

        </table>
    </div>
  </div>

</x-admin-layout>
