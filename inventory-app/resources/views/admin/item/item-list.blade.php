@extends('admin.layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Item</h6>
            <a href="{{ route('admin.item.create') }}" class="btn btn-sm btn-primary shadow-sm d-flex justify-content-center align-items-center">
                Add &nbsp;<i class="fas fa-circle-plus fa-sm text-white-50"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color: #fff; background: #4E73DF">
                            <th class="text-center">SL</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="{{ $item->img_path }}" alt="item image" width="200" height="140">
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-center d-flex justify-content-center align-items-center" style="gap: 6px;">
                                    <a href="{{ route('admin.item.edit', 'id') }}" class="btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit text-white-50" style="width: 24px; height: 24px;"></i>
                                    </a>
                                    <a href="{{ route('admin.item.delete', 'id') }}" class="btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash text-white-50" style="width: 24px; height: 24px;"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
