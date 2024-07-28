@extends('dashboard')
@section('title', 'All Booking')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title"><i class="mdi mdi-account-group-outline"></i> All Booking</h4>
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
                                        <th>Status</th>
                                        <th>tanggal</th>
                                        <th>action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($booking as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($item['product']['image']) }}" alt=""
                                                    style="width: 50px; height:40px;">
                                            </td>
                                            <td>{{ $item['product']['name'] }}</td>
                                            <td>{{ $item['product']['category']['name'] }}</td>
                                            <td><span class="badge bg-warning">{{ $item->booking_status }}</span></td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d-m-Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('booking.details', $item->id) }}"
                                                    class="btn btn-sm btn-primary waves-effect waves-light">Details</i></a>
                                                <a href="{{ route('booking.delete', $item->id) }}"
                                                    class="btn btn-sm btn-danger waves-effect waves-light"
                                                    id="delete">Cancel</a>
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
