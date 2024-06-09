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
    <h3 class="text-center" style="font-family: Times New Roman;">Daftar Trainer</h3>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{ route('admin.dataTrainer.create') }}" class="btn btn-primary" role="button" style="font-family: Times New Roman;">Tambah Trainer</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-3" id="data-table" style="font-family: Times New Roman;">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Umur</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainers as $index => $trainer)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/trainers/' . $trainer->picture)}}" class="rounded" style="width: 50px">
                            </td>
                            <td class="text-center">{{ $trainer->name }}</td>
                            <td class="text-center">{{ $trainer->category }}</td>
                            <td class="text-justify">{{ $trainer->description }}</td>
                            <td class="text-center">{{ $trainer->gender }}</td>
                            <td class="text-center">{{ $trainer->age }}</td>
                            <td class="text-center">{{ $trainer->phone }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.dataTrainer.edit', ['id' => $trainer->id_trainers]) }}" class="btn btn-warning btn-sm mb-1" role="button"><i class="fas fa-edit"></i></a>
                                <a onclick="confirmDelete(this)" href="{{ route('admin.dataTrainer.destroy', ['id' => $trainer->id_trainers]) }}" class="btn btn-danger btn-sm" role="button"><i class="fas fa-trash"></i></a>
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