@extends('dashboard')
@section('title', 'Product')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class=""><a href="{{ route('add.product') }}"
                                        class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                            class="mdi mdi-account-arrow-left-outline"></i> Add Product</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><i class="mdi mdi-account-group-outline"></i> All Product</h4>
                    </div>
                </div>
            </div>
            <br>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;">No.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($product as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($item->image) }}" alt=""
                                                    style="width: 50px; height:40px;">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item['category']['name'] }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>Rp. {{ $item->harga }}</td>
                                            <td>
                                                <a href="{{ route('product.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary waves-effect waves-light"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="{{ route('product.delete', $item->id) }}"
                                                    class="btn btn-sm btn-danger waves-effect waves-light" id="delete"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
