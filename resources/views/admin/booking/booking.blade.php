@extends('dashboard')
@section('title', 'Booking')

@section('content')
    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                <div class="page-title-box">
                    <h4 class="page-title">Booking Kamar</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="tab-content pt-0">
                                    <div class="tab-pane show active" id="product-1-item" role="tabpanel">
                                        <img src="{{ asset($product->image) }}" alt=""
                                            class="img-fluid mx-auto d-block rounded" style="width: 500px">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-7">
                                <div class="ps-xl-3 mt-3 mt-xl-0">
                                    <div class="col-lg-12 col-xl-12">
                                        <h4 class="mb-3">{{ $product->name }}</h4>
                                        <h4 class="mb-4">Harga : <span class="">Rp. {{ $product->harga }}</span>
                                        </h4>
                                        <h4><span class="badge bg-soft-success text-success mb-4">Instock</span></h4>
                                        <p class="text-muted mb-4">Nikmati kemewahan yang terjangkau di kamar kami yang
                                            elegan dan
                                            nyaman,Manjakan diri Anda dengan fasilitas kelas dunia yang disediakan di
                                            setiap
                                            kamar.
                                        </p>
                                        <form method="POST" action="{{ route('booking.store') }}"
                                            enctype="multipart/form-data" id="myForm">
                                            @csrf
                                            <div class="d-flex flex-wrap align-items-center mb-4">
                                                <div class="col-6">
                                                    <label class="my-1 me-2" for="quantityinput">Jumlah</label>
                                                    <div class="me-3">
                                                        <select class="form-select my-1" id="quantityinput" name="jumlah">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="my-1 me-2" for="quantityinput">Tanggal</label>
                                                    <div class="me-3">
                                                        <input type="date" name="tanggal"
                                                            class="form-select my-1 @error('tanggal') is-invalid @enderror"
                                                            autocomplete="off">
                                                        @error('tanggal')
                                                            <span class="text-danger"> Jangan lupa di isi tanggalnya.</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" value="Pending" name="booking_status">
                                            <input type="hidden" value="{{ $userId }}" name="user_id">
                                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                                            <input type="hidden" value="{{ 'Inv' . mt_rand(10000000, 99999999) }}"
                                                name="no_invoice">
                                            <input type="hidden" value="{{ $product->harga }}" name="tagihan">
                                            <div class="text-start">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-cart"></i></span>Booking
                                                    Kamar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end settings content-->
                                </div> <!-- end tab-content -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
@endsection
