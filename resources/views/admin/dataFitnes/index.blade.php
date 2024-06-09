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
<div class="row">               
    <h3 class="text-center" style="font-family: Times New Roman;">Produk Fitnes</h3>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{ route('admin.dataFitnes.create') }}" class="btn btn-primary" role="button" style="font-family: Times New Roman;">Tambah Produk</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-3" id="data-table" style="font-family: Times New Roman;">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name_product }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/product/' . $product->picture)}}" class="rounded" style="width: 50px">
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>Rp.{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.dataFitnes.edit', ['id' => $product->id_product]) }}" class="btn btn-warning btn-sm mb-1" role="button"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.dataFitnes.destroy', ['id' => $product->id_product]) }}" class="btn btn-danger btn-sm" role="button"><i class="fas fa-trash"></i></a>
                            </td>
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
