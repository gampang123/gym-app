<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
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
    <form action="{{ route('submit_order') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id_product }}">
        <div class="pi-pic">
            <img src="{{ asset('storage/product/' . $product->picture) }}" alt="{{ $product->name_product }}">
        </div>
        <h6>{{ $product->name_product }}</h6>
        <label for="order_date">Tanggal Mengikuti : </label>
        <input type="date" name="order_date" id="order_date" required>
        <label for="duration">Durasi : </label>
        <select name="duration" id="duration" required>
            <option value="1">1 Hari</option>
        </select>
        <label for="order_time">Jam Kedatangan : </label>
        <input type="time" name="order_time" id="order_time" required>
        <p class="total">Total Pembayaran : <b>Rp. {{ number_format($product->price, 0, ',', '.') }} </b></p>
        <input type="hidden" name="product_price" id="product_price" value="{{ $product->price }}">
        <br>
        <button type="submit" class="add-to-cart-btn">Pesan Sekarang</button>
        <button type="reset" class="btn btn-danger" onclick="window.location.href='/dashboard'">Batal</button>
    </form>

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
</body>
</html>
