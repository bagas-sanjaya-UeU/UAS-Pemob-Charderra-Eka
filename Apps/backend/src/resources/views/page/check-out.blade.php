@extends('template')



@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1>Check Out</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Pemesanan</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group
                                list-group-item">Nomor Invoice:
                                {{ $transaction->invoice_number }}</li>
                            <li class="list-group
                                list-group-item">User ID:
                                {{ $transaction->user_id }}</li>
                            <li class="list-group
                                list-group-item">Username Game:
                                {{ $transaction->username_in_game }}</li>
                            <li class="list-group
                                list-group-item">Produk:
                                {{ $transaction->product_name }}</li>
                            <li class="list-group
                                list-group-item">Quantity:
                                {{ $transaction->quantity }}</li>
                            <li class="list-group
                                list-group-item">Harga Total:
                                {{ Number::currency($transaction->total_price, in: 'IDR') }}</li>
                            <li class="list-group
                                    list-group-item">Status:
                                {{ $transaction->status }}</li>


                        </ul>



                        <button id="lanjutkan-pembayaran" class="btn btn-primary">Lanjutkan Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.getElementById('lanjutkan-pembayaran').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    window.location.href =
                        '{{ route('transaction.status', [
                            'id' => $transaction->id,
                            'status' => 'SUCCESS',
                        ]) }}'

                },
                // Optional
                onPending: function(result) {
                    '{{ route('transaction.status', [
                        'id' => $transaction->id,
                        'status' => 'PENDING',
                    ]) }}'
                },
                // Optional
                onError: function(result) {
                    '{{ route('transaction.status', [
                        'id' => $transaction->id,
                        'status' => 'FAILED',
                    ]) }}'
                }
            });
        };
    </script>
@endsection
