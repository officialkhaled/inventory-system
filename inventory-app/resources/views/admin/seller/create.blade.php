@extends('admin.layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add Inventory</h6>
            <a href="{{ route('admin.seller.index') }}" class="btn btn-sm btn-primary shadow-sm d-flex justify-content-center align-items-center">
                Back &nbsp;<i class="fas fa-circle-left fa-sm text-white-50"></i>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.seller.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4">
                        <div>
                            <label for="name" class="form-label" style="color: #000;">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="email" class="form-label" style="color: #000;">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="store" class="form-label" style="color: #000;">Store</label>
                            <input type="text" class="form-control" placeholder="Store" name="store">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <div>
                            <label for="password" class="form-label" style="color: #000;">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label class="form-label" for="usertype">Usertype</label>
                            <select id="usertype" name="usertype" class="form-control form-select">
                                <option value="" selected>Select</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center pt-1">
                    <button type="submit" class="btn btn-sm btn-success shadow-sm">
                        Save &nbsp;<i class="fas fa-save fa-sm text-white-50"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
