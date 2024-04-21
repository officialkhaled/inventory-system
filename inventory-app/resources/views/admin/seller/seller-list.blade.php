@extends('admin.layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Seller</h6>
            <a href="{{ route('admin.seller.create') }}" class="btn btn-sm btn-primary shadow-sm d-flex justify-content-center align-items-center">
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
                            <th>Email</th>
                            <th>Store</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellers as $seller)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->store }}</td>
                                <td class="text-center d-flex justify-content-center align-items-center" style="gap: 6px; vertical-align: middle;">
                                    <form action="{{ route('admin.seller.delete', ['user' => $seller->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash text-white-50" style="width: 24px; height: 24px;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
