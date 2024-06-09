@extends('admin.layouts.master')
@section('admin.layouts.index')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Trainer Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dataTrainer.index') }}">Daftar Trainer</a></li>
                        <li class="breadcrumb-item active">Tambah Trainer</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('admin.dataTrainer.update', ['id' => $trainer->id_trainers]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $trainer->name) }}" placeholder="Masukkan Nama Trainer">

                            <!-- Error message untuk nama -->
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category', $trainer->category) }}" placeholder="Masukkan Bidang Trainer">

                            <!-- Error message untuk nama -->
                            @error('category')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi Diri</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',  $trainer->description) }}" placeholder="Tentang Diri Trainer">

                            <!-- Error message untuk nama -->
                            @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Gambar</label>
                            <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture">

                            <!-- Error message untuk gambar -->
                            @error('picture')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                            <!-- Error message untuk gender -->
                            @error('gender')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Umur</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age', $trainer->age) }}" placeholder="Masukkan Umur Trainer">

                            <!-- Error message untuk umur -->
                            @error('age')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $trainer->phone) }}" placeholder="Masukkan Nomor Telepon Trainer">

                            <!-- Error message untuk telepon -->
                            @error('phone')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.content-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endsection