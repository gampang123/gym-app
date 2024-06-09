<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile Photo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .image-container {
            margin-bottom: 20px;
        }
        .image-container img {
            max-width: 100%;
            max-height: 400px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="image-container">
                    @if ($user->picture)
                        <img src="{{ asset('storage/' . $user->picture) }}" alt="User Photo">
                    @else
                        <p>No photo available</p>
                    @endif
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h1>Profile for {{ $user->name }}</h1>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('user.addPhoto', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Picture:</label>
                            <input type="file" name="picture" class="form-control" required>
                            @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Upload Photo</button>
                            @if ($user->picture)
                                <form action="{{ route('user.deletePhoto', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete Photo</button>
                                </form>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
