<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Kelas</title>
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            background-image: url('images/schedule-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        form {
            max-width: 470px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; 
        }

        h6 {
            margin-top: 0;
            font-size: 21px;
            color: #333;
            margin-bottom: 15px; 
        }

        .pi-pic {
            display: flex;
            justify-content: center; 
            align-items: center; 
            margin-bottom: 20px; 
        }

        .pi-pic img {
            max-width: 100%; 
            height: auto;
        }

        .harga {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 20px; 
            font-size: 16px;
            color: #333;
        }

        input[type="date"]
        {
            width: 200px; 
            padding: 8px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        select {
            width: 220px; 
            padding: 8px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type="time"]
        {
            width: 200px; 
            padding: 8px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .total {
            font-size: 20px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 8px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        button[type="reset"] {
            background-color: red;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 8px;
        }

        button[type="reset"]:hover {
            background-color: #800000;
        }
    </style>
</head>
<body>
    <form action="{{ route('submit_booking') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="program_id" value="{{ $program->id_program }}">
        <div class="pi-pic">
            <img src="{{ asset('storage/program/' . $program->picture) }}" alt="{{ $program->nama_program }}">
        </div>
        <h6>{{ $program->nama_program }}</h6>
        <label for="duration">Durasi Kelas : </label>
        <select name="duration" id="duration" required>
            <option value="1">1 Bulan</option>
            <option value="2">2 Bulan</option>
            <option value="3">3 Bulan</option>
            <option value="4">4 Bulan</option>
            <option value="5">5 Bulan</option>
            <option value="6">6 Bulan</option>
        </select>     
        <p class="total">Total Pembayaran : <b id="total_payment_display">Rp. {{ number_format($program->price, 0, ',', '.') }} </b></p>
        <input type="hidden" name="total_payment" id="total_payment" value="{{ $program->price }}">
        <br>
        <button type="submit" class="add-to-cart-btn">Booking Sekarang</button>
        <button type="reset" class="btn btn-danger" onclick="window.location.href='/dashboard'">Batal</button>
    </form>

    <script>
        document.getElementById('duration').addEventListener('change', function() {
            var price = {{ $program->price }};
            var duration = this.value;
            var totalPayment = price * duration;
            document.getElementById('total_payment').value = totalPayment;
            document.getElementById('total_payment_display').innerText = 'Rp. ' + totalPayment.toLocaleString('id-ID');
        });
    </script>
</body>
</html>
