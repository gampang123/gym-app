@extends('user.layouts.master')
@section('user.layouts.index')
<div class="container">
    <h3 class="text-center" style="font-family: Times New Roman;">Booking Kelas</h3>
    @if($bookings->isEmpty())
        <p>Anda belum booking kelas apapun</p>
    @else
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID Booking</th>
                            <th class="text-center">Nama Kelas</th>
                            <th class="text-center">Lama Program</th>
                            <th class="text-center">Total Pembayaran</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Pilih Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td class="text-center">{{ $booking->id_booking }}</td>
                                <td class="text-center">{{ $booking->program->nama_program }}</td>
                                <td class="text-center">{{ $booking->duration }} Bulan</td>
                                <td class="text-center">Rp. {{ number_format($booking->total_payment, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pay', ['orderId' => $booking->id_booking]) }}" class="btn btn-success">Bayar</a> 
                                    <a href="{{ route('booking.generate.invoice', $booking->id_booking) }}" class="btn btn-primary">Cetak</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('classtime_form', ['booking_id' => $booking->id_booking]) }}" class="btn btn-primary">Jadwal</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>    
    
 <!-- Content Row -->
 <div class="row">
        <!-- ISI KONTEN -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection