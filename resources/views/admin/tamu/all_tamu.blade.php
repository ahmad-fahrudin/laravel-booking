@extends('dashboard')
@section('title', 'Tamu')

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
                                <li class=""><a href="{{ route('add.tamu') }}"
                                        class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                            class="mdi mdi-account-arrow-left-outline"></i> Add Tamu</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title"><i class="mdi mdi-account-group-outline"></i> All Tamu</h4>
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
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Alamat</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($tamu as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>
                                                <a href="{{ route('tamu.edit', $item->id) }}"
                                                    class="btn btn-sm btn-blue waves-effect waves-light"><i
                                                        class="fas fa-pencil-alt"></i> Edit</a>
                                                <a href="{{ route('tamu.delete', $item->id) }}"
                                                    class="btn btn-sm btn-danger waves-effect waves-light" id="delete"><i
                                                        class="fas fa-trash-alt"></i> Delete</a>
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
