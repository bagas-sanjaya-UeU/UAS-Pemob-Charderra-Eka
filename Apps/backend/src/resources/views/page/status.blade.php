@extends('template')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-bold">{{ $transaction->status }} <i
                                class="bi {{ $transaction->status === 'PENDING' ? 'bi-clock text-primary' : ($transaction->status === 'SUCCESS' ? 'bi-check-circle text-success' : 'bi-x text-danger') }}"></i>
                        </h5>
                        <p class="card-text fw-bold">Nomor Invoice: {{ $transaction->invoice_number }}</p>
                        <p class="card-text">User ID: {{ $transaction->user_id }}</p>
                        <p class="card-text">Username Game: {{ $transaction->username_in_game }}</p>
                        <p class="card-text">Produk: {{ $transaction->product_name }}</p>
                        <p class="card-text">Quantity: {{ $transaction->quantity }}</p>
                        <p class="card-text">Harga Total: {{ Number::currency($transaction->total_price, in: 'IDR') }}</p>
                        <p class="card-text">Status: <span
                                class="badge {{ $transaction->status === 'PENDING' ? 'bg-primary' : ($transaction->status === 'SUCCESS' ? 'bg-success' : 'bg-danger') }}">{{ $transaction->status }}</span>
                        </p>
                        @if ($transaction->status === 'SUCCESS')
                            <a href="{{ route('home') }}">Kembali ke halaman depan</a>
                        @endif


                        @if ($transaction->status === 'PENDING')
                            <button id="lanjutkan-pembayaran" class="btn btn-primary">Lanjutkan Pembayaran</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
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
