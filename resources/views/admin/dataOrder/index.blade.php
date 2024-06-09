@extends('admin.layouts.master')
@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
@endsection
@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script>
        $.fn.dataTable.ext.errMode = 'throw';
        $(function() {
        $("#data-table").DataTable({
            paging: true
        });
        });
    </script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
            'title' : 'Konfirmasi Hapus',
            'text' : 'Apakah kamu yakin ingin menghapus data ini?',
            'dangermode' : true,
            'buttons' :true,
            }).then(function(value) {
            if (value) {
                window.location = url;
            }
            })
        }
  </script>
@endsection

@section('admin.layouts.index')

    <!-- Content Row -->
    <div class="row">               
        <h3 class="text-center" style="font-family: Times New Roman;">Daftar Pemesanan Paket</h3>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered mb-3" id="data-table" style="font-family: Times New Roman;">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Paket</th>
                        <th class="text-center">Waktu Pesan</th>
                        <th class="text-center">Jam Kedatangan</th>
                        <th class="text-center">Tagihan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $index => $order)
                        <tr class="text-center">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $order->user->name }}</td>
                            <td class="text-center">{{ $order->product->name_product }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($order->order_date)->locale('id')->isoFormat('D MMMM YYYY') }}</td>
                            <td class="text-center">{{ $order->order_time }}</td>
                            <td class="text-center">Rp. {{ number_format($order->total_payment, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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