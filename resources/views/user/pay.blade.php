@extends('user.layouts.master')
@section('user.layouts.index')
<div class="container">
    <h3 class="text-center">Pembayaran</h3>
    <div class="text-center">
        <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log(result);
                window.location.href = '/';
            },
            onPending: function(result) {
                console.log(result);
                window.location.href = '/';
            },
            onError: function(result) {
                console.log(result);
                window.location.href = '/';
            },
            onClose: function() {
                alert('You closed the popup without finishing the payment');
            }
        });
    };
</script>
<!-- Content Row -->
 <div class="row">
        <!-- ISI KONTEN -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection