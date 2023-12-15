<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Welcome John! 🎉</h5>
                                <p class="mb-4">
                                    You are the <span class="fw-bold">admin</span> of this website. edit any section and
                                    add any thing
                                    you want to <span class="fw-bold">E-commerce</span>.
                                </p>

                            </div>

                        </div>

                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('dashboard/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <ul>
                <li>
                    <p style="font-weight: bolder;"> WELCOME {{ auth()->user()->name }}</p>
                </li>
                <li class="nav-item">
                    <div class="col-md-4">
                        <a href="/logout" class="btn btn-danger filled-button">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="col-md-4">
                        <a href="/home" class="btn btn-success filled-button">Default website</a>
                    </div>
                </li>
        </ul>

        <div class="card">
            <h5 class="card-header">Users Table</h5>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>User Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{ $user->name }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{ $user->email }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{ $user->role == 1 ? 'User' : 'Admin' }}</strong>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/edituser/{{ $user->id }}"><i
                                                class="bx bx-edit me-1"></i> Edit</a>
                                        {{-- </div>
                                    <div class="dropdown-menu"> --}}
                                        <a class="dropdown-item" href="/deleteuser/{{ $user->id }}"><i
                                                class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
