@extends('dashboard')

@section('title', 'Dashboard Donasi')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Data Donasi</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Payment Id</th>
                                        <th>Judul Donasi</th>
                                        <th>name</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($donations as $donate)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $donate->payment_id }}</td>
                                            <td>{{ $donate->post->title }}</td>
                                            <td>{{ $donate->name }}</td>
                                            <td>{{ $donate->amount }}</td>
                                            <td>{{ $donate->payment_method }}</td>
                                            <td>{{ $donate->status }}</td>
                                           
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse

                                </tbody>

                                {{ $donations->links() }}

                            </table>

                            Note : No 1 adalah Data terbaru
                        </div>
                        {{-- <a href="{{ route('dashboard.transaction.create') }}" class="btn btn-primary">Tambah Data</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
