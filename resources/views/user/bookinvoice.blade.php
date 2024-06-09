<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Bukti Pembayaran</title>
    <style>
         .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
            background-color: #f9f9f9;
        }

        .invoice-box h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            font-weight: 700;
            font-family: 'Times New Roman', Times, serif;
        }

        .title {
            margin-left: 20px;
        }

        .title h1 {
            font-size: 45px;
            line-height: 45px;
            color: #333;
            margin: 0;
            text-align: center;
            font-weight: bold;
            font-family: sans-serif;
        }

        .title h1 span {
            font-size: 45px;
            font-weight: bold;
            color: #ed563b;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
            font-family: 'Times New Roman', Times, serif;
        }

        .invoice-box table td {
            padding: 10px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 20px;
            font-size: 16px;
            color: #333;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-family: 'Times New Roman', Times, serif;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
            padding-top: 20px;
        }

        .status {
            margin-top: 20px;
            text-align: center;
            font-size: 20px;
            color: #28a745;
            font-weight: 800;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h3>Bukti Pembayaran</h3>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h1>Godzilla <span>Sport</span></h1>
                            </td>
                            <td>
                                Kode Invoice : #111{{ $booking->id_booking }}<br />
                                Dicetak :  {{ \Carbon\Carbon::now()->locale('id')->format('d F Y') }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Jl. Pemuda Paragon Mall Lantai 2 & 3 Sekayu <br />
                                Kec.Semarang Tengah, Kota Semarang, Jawa Tengah<br /><br />
                                <b>Nama :</b> {{ $booking->user->name }}<br />
                                <b>Email :</b> {{ $booking->user->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Nama Produk</td>
                <td>{{ $booking->program->nama_program }}</td>
            </tr>

            <tr class="heading">
                <td>Tanggal Booking</td>
                <td>{{ \Carbon\Carbon::parse($booking->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}</td>
            </tr>

            <tr class="heading">
                <td>Durasi Kelas</td>
                <td>{{ $booking->duration }} Bulan</td>
            </tr>

            <tr class="total">
                <td>Total Pembayaran</td>
                <td>Rp. {{ number_format($booking->total_payment, 0, ',', '.') }}</td>
            </tr>
        </table>
        <div class="status">
            <h2>Pembayaran Lunas</h2>
        </div>
    </div>
</body>
</html>
