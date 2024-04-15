@extends('admin.layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Inventory</h6>
            <a href="{{ route('admin.inventory.create') }}" class="btn btn-sm btn-primary shadow-sm d-flex justify-content-center align-items-center">
                Add &nbsp;<i class="fas fa-circle-plus fa-sm text-white-50"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color: #fff; background: #4E73DF">
                            <th class="text-center" style="width: 3%">SL</th>
                            <th style="width: 15%;">Name</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inventories as $inventory)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $inventory->name }}</td>
                                <td>{{ $inventory->description }}</td>
                                <td class="text-center d-flex justify-content-center align-items-center" style="gap: 6px; vertical-align: middle;">
                                    <a href="{{ route('admin.item.index') }}" class="btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-box-open text-white-50" style="width: 24px; height: 24px;"></i>
                                    </a>
                                    <a href="{{ route('admin.inventory.edit', ['inventory' => $inventory->id]) }}" class="btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit text-white-50" style="width: 24px; height: 24px;"></i>
                                    </a>
                                    <form action="{{ route('admin.inventory.delete', ['inventory' => $inventory->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash text-white-50" style="width: 24px; height: 24px;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">
                @if(session('success'))
                    Success
                @elseif(session('error'))
                    Error
                @endif
            </strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            @if(session('success'))
                Inventory has been added successfully!
            @elseif(session('error'))
                Something Went Wrong!
            @endif
        </div>
    </div>

    <!-- Toast Container -->
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-absolute top-0 end-0 p-3">
            <!-- Success Toast -->
            @if (session('success'))
                <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Error Toast -->
            @if (session('error'))
                <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
