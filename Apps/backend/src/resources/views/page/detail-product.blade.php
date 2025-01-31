@extends('template')

@section('content')
    <h1>Detail {{ $name }}</h1>

    <div class="row">
        <div class="col-md-4">
            <img src="https://placehold.co/700x700" class="img-fluid" alt="...">
        </div>
        <div class="col-md-8">
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <input type="hidden" name="username_in_game" id="username-game">

                <label for="userid" class="form-label fw-bold">User ID <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <input type="text" name="user_id" class="form-control" id="user_id" required>
                    <button class="btn btn-outline-secondary" type="button" id="button-check-user">Check Username</button>
                </div>
                @if (Str::contains(strtolower($name), 'mobile-legends'))
                    <small>Note. User ID & Server ID digabung, Cth. 123456781234</small>
                @else
                    <small>Note. Gunakan Hastag untuk mengabungkan user Id dan Server Id</small>
                @endif

                <div class="mb-3 mt-3">
                    <h5>Produk <span class="text-danger">*</span></h5>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
                        @foreach ($filtered_products as $product)
                            <div class="col">
                                <input type="radio" value="{{ $product['kode'] }}" class="btn-check produk" name="produk"
                                    id="btnradio{{ $product['kode'] }}" autocomplete="off"
                                    {{ $product['status'] == '0' ? 'disabled' : '' }}>
                                <label
                                    class="btn {{ $product['status'] == '0' ? 'btn-outline-danger' : 'btn-outline-success' }}  bg-gradient item mb-3"
                                    for="btnradio{{ $product['kode'] }}">
                                    <p>{{ $product['keterangan'] }} <span
                                            class="{{ $product['status'] == '0' ? 'badge text-bg-danger' : '' }}">{{ $product['status'] == '0' ? 'Gangguan' : '' }}</span>
                                    </p>

                                    <span class=" fw-bold text-end" id="harga">
                                        {{ Number::currency($product['harga'] + 2000, in: 'IDR') }}</span>

                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email (Optional)</label>
                    <input type="text" name="email" class="form-control" id="email">
                    <small>Diisi Untuk dikirimkan bukti transaksi</small>
                </div>

                <div class="card detail-pemesanan">
                    <div class="card-body">
                        Detail Pemesanan
                        <ul class="list-group
                            list-group-flush">
                            <li class="list-group
                                list-group-item">Username Game : <span
                                    class="fw-bold" id="username">-</span></li>
                            <li class="list-group
                                list-group-item">No Handphone : <span
                                    class="fw-bold" id="no-hp-text">-</span></li>
                            <li class="list-group

                                list-group-item">Total : <span
                                    class="fw-bold" id="total">-</span></li>
                        </ul>

                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3 mb-3" id="lanjutkan-pembayaran" disabled>Lanjutkan
                    Pembayaran</button>
                <br>
                <p class="mb-4">Note. Lanjutkan pembayaran aktif jika username ditemukan dan produk sudah dipilih
                </p>
            </form>
        </div>
    </div>
@endsection
@php
    $isMobileLegends = Str::contains(strtolower($name), 'mobile-legends');
    $code = strtolower($name);

@endphp

@section('script')
    <script>
        window.addEventListener('load', function() {
            let buttonCheckUser = document.getElementById('button-check-user');
            let server_id = null;
            let produk = document.querySelectorAll('.produk');
            let total = document.getElementById('total');
            let harga = document.querySelectorAll('#harga');
            let buttonLanjutkanPembayaran = document.getElementById('lanjutkan-pembayaran');
            let inputUsernameGame = document.getElementById('username-game');
            let selectedProduct = null;

            buttonCheckUser.addEventListener('click', function() {
                let user_id = document.getElementById('user_id').value;

                let isMobileLegends = {{ $isMobileLegends ? 'true' : 'false' }};

                if (isMobileLegends === true || isMobileLegends === 'true') {
                    server_id = user_id.slice(-4);
                }

                // Ensure that server_id has a value only for Mobile Legends
                let additionalTarget = isMobileLegends === true || isMobileLegends === 'true' ? server_id :
                    null;

                let url = '{{ route('check-username') }}'

                let body = {
                    type: 'get-nickname',
                    code: '{{ $code }}',
                    target: user_id,
                    additional_target: additionalTarget
                };

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',

                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute(
                                    'content')
                        },
                        body: JSON.stringify(body)
                    })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        try {
                            if (data.status === 'success') {
                                let username = document.getElementById('username');
                                let inputUsername = document.querySelector(
                                    'input[name="username_in_game"]');
                                inputUsername.value = data.data.data;
                                username.innerHTML = data.data.data;

                                if (inputUsernameGame.value.length > 0 && selectedProduct !== null) {
                                    buttonLanjutkanPembayaran.removeAttribute('disabled');
                                } else {
                                    buttonLanjutkanPembayaran.setAttribute('disabled', 'disabled');
                                }

                                Swal.fire('Username ditemukan',
                                    data.data.data, 'success');
                            } else {
                                let username = document.getElementById('username');
                                let inputUsername = document.querySelector(
                                    'input[name="username_in_game"]');
                                inputUsername.value = '';
                                username.innerHTML = '-';
                                buttonLanjutkanPembayaran.setAttribute('disabled', 'disabled');
                                Swal.fire('Oops...',
                                    data.data, 'error');
                            }
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });

            let noHp = document.getElementById('no-hp');
            if (noHp) {
                noHp.addEventListener('input', function() {
                    if (noHp.value.length > 0) {
                        let noHpText = document.getElementById('no-hp-text');
                        noHpText.innerHTML = noHp.value;
                    } else {
                        let noHpText = document.getElementById('no-hp-text');
                        noHpText.innerHTML = '-';
                    }
                });
            }

            produk.forEach((product) => {
                product.addEventListener('change', function() {
                    selectedProduct = this.value;
                    let hargaProduk = this.nextElementSibling.querySelector('#harga').innerHTML;
                    total.innerHTML = hargaProduk;

                    if (inputUsernameGame.value.length > 0 && selectedProduct !== null) {
                        buttonLanjutkanPembayaran.removeAttribute('disabled');
                    } else {
                        buttonLanjutkanPembayaran.setAttribute('disabled', 'disabled');
                    }
                });
            });

        });
    </script>
@endsection
