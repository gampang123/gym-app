@extends('admin.layouts.master')
@section('admin.layouts.index')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Kelas</li>
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
                    <form action="{{ route('admin.dataClass.update', ['id' => $class->id_class]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Kelas</label>
                            <input type="text" class="form-control @error('class_name') is-invalid @enderror" name="class_name" value="{{ old('class_name', $class->class_name) }}" placeholder="Masukkan Nama Kelas">

                            <!-- Error message untuk nama kelas -->
                            @error('class_name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Hari</label>
                            <input type="text" class="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day', $class->day) }}" placeholder="Masukkan Hari">

                            <!-- Error message untuk hari -->
                            @error('day')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jam Mulai</label>
                            <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time', $class->start_time) }}">

                            <!-- Error message untuk jam mulai -->
                            @error('start_time')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jam Selesai</label>
                            <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time', $class->end_time) }}">

                            <!-- Error message untuk jam selesai -->
                            @error('end_time')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Trainer</label>
                            <select class="form-control @error('id_trainers') is-invalid @enderror" name="id_trainers">
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id_trainers }}" {{ $class->id_trainers == $trainer->id_trainers ? 'selected' : '' }}>{{ $trainer->name }}</option>
                                @endforeach
                            </select>

                            <!-- Error message untuk trainer -->
                            @error('id_trainers')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-md btn-warning">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.content-wrapper -->

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>
@endsection
