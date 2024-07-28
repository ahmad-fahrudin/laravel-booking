<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\User;
use App\Models\Status;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    ///////////////////////////////// Kamar All Route ///////////////////////////
    public function Kamar()
    {
        $product = Product::with('category')->get();
        return view('admin.booking.kamar', compact('product'));
    }

    ///////////////////////// Booking All Route /////////////////////////

    public function Booking($id)
    {

        $product = Product::findOrFail($id);
        $userId = auth()->user()->id;
        return view('admin.booking.booking', compact('product', 'userId'));
    }
    public function BookingStore(Request $request)
    {

        $validateData = $request->validate([
            'tanggal' => 'required|date',
        ]);

        // Periksa apakah tanggalnya sudah dipesan
        $existingBooking = Booking::where('tanggal', $request->tanggal)->first();
        if ($existingBooking) {
            $toastr = array(
                'warning' => 'Mohon Maaf, Tanggal ini sudah dibooking.'
            );
            return redirect()->back()->with($toastr);
        }

        Booking::insert([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'no_invoice' => $request->no_invoice,
            'booking_status' => $request->booking_status,
            'tagihan' => $request->tagihan,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'created_at' => Carbon::now(),
        ]);
        $toastr = array(
            'success' => 'Booking Successfully.'
        );
        return redirect()->route('all.booking')->with($toastr);
    }
    public function allBooking()
    {
        $booking = Booking::where('booking_status', 'pending')->get();
        return view('admin.booking.all_booking', compact('booking'));
    }

    public function BookingDetails($id)
    {
        $booking = Booking::where('id', $id)->first();
        return view('admin.booking.details_booking', compact('booking'));
    }

    public function BookingUpdate(Request $request)
    {
        $booking_id = $request->id;
        Booking::findOrFail($booking_id)->update(['booking_status' => 'complete']);

        $toastr = array(
            'success' => 'Booking Done Successfully.'
        );
        return redirect()->route('complete.booking')->with($toastr);
    } //end method

    public function completeBooking()
    {
        $booking = Booking::where('booking_status', 'complete')->get();
        return view('admin.booking.complete_booking', compact('booking'));
    }

    public function BookingDelete($id)
    {
        Booking::findOrFail($id)->delete();

        $toastr = array(
            'success' => 'Booking Deleted Successfully.'
        );
        return redirect()->back()->with($toastr);
    }
}
