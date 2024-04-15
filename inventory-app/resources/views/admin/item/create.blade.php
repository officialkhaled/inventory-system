@extends('admin.layout')
@section('content')

    <style>
        .upload-style {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #f8f8f8;
            cursor: pointer;
            padding-bottom: 100px;
            padding-left: 90px;
            padding-right: 40px;
            padding-top: 24px;
            width: 100%;
        }

        .upload-style:before {
            content: "";
            font-size: 1.1em;
            font-weight: 500;
            color: black;
            margin-bottom: 20px;
            margin-left: -56px;
        }

        input[type="file"] {
            color: #4E73DF;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
            <a href="{{ route('admin.item.index') }}" class="btn btn-sm btn-primary shadow-sm d-flex justify-content-center align-items-center">
                Back &nbsp;<i class="fas fa-circle-left fa-sm text-white-50"></i>
            </a>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4">
                        <div>
                            <label for="name" class="form-label" style="color: #000;">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label for="description" class="form-label" style="color: #000;">Description</label>
                            <input type="text" class="form-control" placeholder="Description" name="description" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label class="form-label" for="quantity" style="color: #000;">Quantity</label>
                            <input type="number" class="form-control" placeholder="Quantity" name="quantity" value="">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8">
                        <div>
                            <label for="img_path" class="form-label" style="color: #000;">Image</label>
                            <input class="form-control upload-style" type="file" name="img_file" id="formFile">
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
