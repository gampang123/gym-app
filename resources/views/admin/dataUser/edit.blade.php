@extends('admin.layouts.master')
@section('admin.layouts.index')

                    <!-- Content Row -->
                    <div class="row">               
                        <h2>Edit User</h2>
                    </div>

                    <!-- Content Row -->
                    <form action="{{ route('admin.dataUsers.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="userType">User Type</label>
                            <input type="text" class="form-control" id="userType" name="userType" value="{{ $user->userType }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    

                    <!-- Content Row -->
                    <div class="row">
                        <!-- ISI KONTEN -->
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection