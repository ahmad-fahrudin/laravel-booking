@extends('dashboard')
@section('title', 'Edit Product')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title"><i class="mdi mdi-account-group-outline"></i> Edit Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-pane">
                                <form method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data"
                                    id="myForm">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    value="{{ $product->name }}" name="name" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Category Name</label>
                                                <select class="form-control" name="category_id" id="">
                                                    <option selected disabled>Select Category</option>
                                                    @foreach ($category as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="text" class="form-control" id=""
                                                    value="{{ $product->stock }}" name="stock">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-label">Harga</label>
                                                <input type="text" class="form-control" id=""
                                                    value="{{ $product->harga }}" name="harga">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group mb-3">
                                                <label for="image" class="form-label">Image</label>
                                                <input type="file" id="image" class="form-control" name="image"
                                                    value="{{ $product->image }}">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <img src="{{ url('upload/no_image.jpg') }}"
                                                    class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"
                                                    id="showImage" style="width: 100px;">
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->
                        </div> <!-- end tab-content -->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
