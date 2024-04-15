@extends('admin.layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add Inventory</h6>
            <a href="{{ route('admin.inventory.index') }}" class="btn btn-sm btn-primary shadow-sm d-flex justify-content-center align-items-center">
                Back &nbsp;<i class="fas fa-circle-left fa-sm text-white-50"></i>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.inventory.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4">
                        <div>
                            <label for="name" class="form-label" style="color: #000;">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div>
                            <label for="description" class="form-label" style="color: #000;">Description</label>
                            <textarea name="description" placeholder="Description" rows="5" class="form-control"></textarea>
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
