@extends('user.layouts.master')
@section('user.layouts.index')
<div class="container">
    <h3 class="text-center" style="font-family: Times New Roman;">Riwayat Pemesanan Paket Gym dan Fitness</h3>
    @if($orders->isEmpty())
        <p>Anda belum pesan paket gym apapun</p>
    @else
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID Pesanan</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Durasi (Hari)</th>
                            <th class="text-center">Total Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            @php
                                $orderDate = \Carbon\Carbon::parse($order->order_date);
                                $orderDate->setTimezone('Asia/Jakarta');                                     
                                $today = \Carbon\Carbon::now('Asia/Jakarta');
                            @endphp
                            @if($orderDate->lessThan($today))
                                <tr>
                                    <td class="text-center">{{ $order->id_order }}</td>
                                    <td class="text-center">{{ $order->product->name_product }}</td>
                                    <td class="text-center">{{ $orderDate->locale('id')->isoFormat('D MMMM YYYY') }}</td>
                                    <td class="text-center">{{ $order->duration }}</td>
                                    <td class="text-center">Rp. {{ number_format($order->total_payment, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
    @endif
            </div>
        </div>
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