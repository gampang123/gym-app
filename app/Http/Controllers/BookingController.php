<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Booking;
use App\Models\Program;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.dataBooking.index', compact('bookings'));
    }

    public function viewBooking()
    {
        $userId = Auth::id();

        $bookings = Booking::where('user_id', $userId)->get();

        return view('user.layouts.booking', compact('bookings'));
    }

    public function submitBooking(Request $request)
    {
        $programId = $request->program_id;

        $program = Program::find($programId);

        if (!$program) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        $totalPayment = $program->price * $request->duration;

        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->id_program = $programId;
        $booking->duration = $request->duration;
        $booking->total_payment = $totalPayment;

        $booking->save();

        return Redirect::route('user.booking')->with('success', 'Pesanan berhasil.');
    }

    public function bookingForm(Request $request)
    {
        $programId = $request->query('program_id');
        $program = Program::findOrFail($programId);

        return view('user.booking', compact('program'));
    }

    public function generateInvoice($id_booking)
    {
        $booking = Booking::find($id_booking);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking tidak ditemukan');
        }

        if ($booking->user_id !== Auth::id()) {
            return abort(403, 'Unauthorized');
        }

        $pdf = PDF::loadView('user.bookinvoice', compact('booking'));

        return $pdf->download('bukti_booking_' . $booking->id_booking . '_' . $booking->user->name . '.pdf');
    }
}