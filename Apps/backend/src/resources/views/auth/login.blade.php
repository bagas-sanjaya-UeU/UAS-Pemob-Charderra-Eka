@extends('template')

@section('content')
     <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Login</h4>

                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form action="{{ route('authenticate') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3 mb-3">
                    <a href="{{ route('register') }}">Belum punya akun? Daftar disini</a>
                    
                </div>
                
     </div>

@endsection
