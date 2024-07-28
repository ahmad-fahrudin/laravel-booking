@extends('dashboard')
@section('title', 'Add Category')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Category</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-10 col-xl-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-pane">
                                <form class="px-3" action="{{ route('category.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            required="" placeholder="Add Category Name" name="name">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
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
@endsection
