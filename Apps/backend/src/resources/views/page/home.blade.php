@extends('template')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <div class="hero-content">
                        <h1>
                            Donasi Kita <br> <span>Platform Donasi Online</span>
                        </h1>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://images.bisnis.com/posts/2021/12/10/1476128/donasi.jpeg" alt="Donasi Kita"
                        class="img-fluid rounded-circle">
                </div>
            </div>
            <div class="row mt-5">
                <!-- Card 1 -->
                <div class="col-md-4 mb-3 ">
                    <div class="icon-card shadow">
                        <i class="bi 
                        bi-people
                        "></i>
                        <h4>
                            Donasi Online
                        </h4>
                        <p>
                            Kami menyediakan layanan donasi online yang mudah dan aman.
                        </p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4 mb-3 ">
                    <div class="icon-card shadow">
                        <i class="bi 
                        bi-shield-check
                        "></i>
                        <h4>
                            Aman dan Terpercaya
                        </h4>
                        <p>
                            Kami menjamin keamanan dan kepercayaan donasi yang diberikan.
                        </p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="icon-card shadow">
                        <i class="bi 
                        bi-credit-card
                        "></i>
                        <h4>
                            Pembayaran Mudah
                        </h4>
                        <p>
                            Kami menyediakan berbagai metode pembayaran yang mudah dan aman.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Yuridik Shaxslar Uchun Section -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center p-2">
                <!-- Text and Features -->
                <div class="col-md-6 mt-2">
                    <h2>
                        Tentang Donasi Kita
                    </h2>
                    <p class="text-start">
                        Donasi Kita adalah platform donasi online yang memudahkan masyarakat untuk berdonasi kepada
                        berbagai lembaga sosial, panti asuhan, yayasan, dan lainnya. Kami menyediakan berbagai metode
                        pembayaran yang mudah dan aman. Kami juga menjamin keamanan dan kepercayaan donasi yang diberikan.
                    </p>

                    
                </div>
                <!-- Image -->
                <div class="col-md-6 image-wrapper">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.bisnis.com/posts/2021/12/10/1476128/donasi.jpeg" class="d-block w-100"
                                    alt="Midnet Home Networking Logo">
                            </div>
                            
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fast Telecom Section -->
    <section class="app-section" id="app">
        <div class="container">
            <div class="row align-items-center">
                
                <!-- Left Content -->
                <div class="col-md-6 text-center text-md-start mt-5 mt-md-0">
                    <small>Segera Hadir</small>
                    <h2>Donasi Kita </h2>
                    <p>
                        Donasi Kita segera hadir di Play Store. Download aplikasi kami dan berdonasilah dengan mudah dan
                        aman.
                    </p>
                    <div class="download-buttons">
                        <a href="#" class="link-underline link-underline-opacity-0 ">
                            <p class="text-primary"><i class='bx bxl-play-store fs-2'></i> Play Store </p>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
