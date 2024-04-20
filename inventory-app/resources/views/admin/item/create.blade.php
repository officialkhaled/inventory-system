@extends('admin.layout')
@section('content')
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <style>
        .upload-style {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #f8f8f8;
            cursor: pointer;
            padding: 24px 40px 100px 90px;
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
        
        .profile-image-container {
            display: flex;
            justify-content: center;
            min-height: 120px;
            max-height: 280px;
            overflow: hidden;
            border-radius: 8px;
        }
        
        .profile-image {
            width: 75%;
            object-fit: contain;
        }
    </style>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
            <a href="{{ route('admin.inventory.item.index', ['inventory' => $inventory->id]) }}" class="btn btn-sm btn-primary shadow-sm d-flex justify-content-center align-items-center">
                Back &nbsp;<i class="fas fa-circle-left fa-sm text-white-50"></i>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.inventory.item.store', ['inventory' => $inventory->id]) }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" placeholder="Description" name="description" >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label class="form-label" for="quantity" style="color: #000;">Quantity</label>
                            <input type="number" class="form-control" placeholder="Quantity" name="quantity">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8">
                        <div>
                            <label for="img_path" class="form-label" style="color: #000;">Image</label>
                            <input class="form-control upload-style" name="img_path" type="file" id="image">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="profile-image-container">
                            <img id="showImage" class="profile-image avatar-lg" src="{{ asset('assets/images/no_image.jpg') }}" alt="">
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
    
    <script type="text/javascript">
        
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    
    </script>
    
@endsection
