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
        <h3 class="text-center" style="font-family: Times New Roman;">Daftar Booking Program Kelas</h3>
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
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Lama Program</th>
                        <th class="text-center">Tanggal Booking</th>
                        <th class="text-center">Tagihan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $index => $booking)
                        <tr class="text-center">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $booking->user->name }}</td>
                            <td class="text-center">{{ $booking->program->nama_program }}</td>
                            <td class="text-center">{{ $booking->duration }} Bulan</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($booking->created_at)->translatedFormat('j F Y \J\a\m H:i') }}</td>
                            <td class="text-center">Rp. {{ number_format($booking->total_payment, 0, ',', '.') }}</td>
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