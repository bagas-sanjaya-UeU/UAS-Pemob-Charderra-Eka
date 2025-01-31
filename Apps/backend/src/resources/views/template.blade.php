<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="
     Midnet Home Networking merupakan salah satu penyedia layanan internet (ISP) yang berkerja sama dengan penyedia dedicated internet service, Menawarkan beragam paket internet yang terjangkau dengan fokus pada pemasangan, pembayaran dan perawatan koneksi internet. Maulana Idris selaku pemilik Midnet Home Networking mendirikan bisnis pada tahun 2019 Berlokasi di Kampung Kapudang Desa Sukatani.">
    <meta name="keywords"
        content="
    midnet, midnet home networking, isp, internet service provider, internet, paket internet, internet cepat, internet murah, internet stabil, internet terjangkau, internet berkualitas, internet 24 jam, internet unlimited, internet tanpa kuota, internet tanpa batas, internet sehat, internet aman, internet nyaman, internet terbaik, internet tercepat, internet terhandal, internet terpercaya, internet terbaru, internet terupdate, internet terlengkap, internet terpadu, internet terintegrasi, internet terkoneksi, internet terhubung, internet terpilih, internet terpilih, kapudang, cisoka
    ">
    <meta name="author" content="Charderra Sanjaya">
    <meta name="robots" content="index, follow">
    <title>Donasi Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        .hero-section {
            background-color: #d8fdd1;
            padding: 60px 0;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .icon-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: white;
            text-align: center;
            transition: box-shadow 0.3s ease-in-out;
        }

        .icon-card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .icon-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .tarif-section {
            padding: 40px 0;
            background-color: #f9f9f9;
        }

        .tarif-section h2 {
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .tarif-card {
            border-radius: 12px;
            padding: 20px;
            background-color: white;
            text-align: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .tarif-card .badge {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4caf50;
            color: white;
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 12px;
        }

        .tarif-card img {
            width: 100px;
            height: 100px;
            margin-top: 15px;
        }

        .tarif-card h4 {
            margin-top: 20px;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .tarif-card p {
            margin-bottom: 0.5rem;
        }

        .tarif-card .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff5722;
        }

        #about {
            background-color: #d8fdd1;
        }

        .app-section {
            background-color: #e6ebe5;
            padding: 50px 0;
        }

        .app-section h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .app-section p {
            margin-bottom: 30px;
            font-size: 1rem;
            color: #555;
        }

        .app-logo {
            background-color: black;
            color: white;
            border-radius: 50%;
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .download-buttons img {
            width: 160px;
            margin: 10px 5px;
        }

        .phone-mockup {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>

</head>

<body>

    @include('page.component.navbar')


    @yield('content')


    @include('page.component.footer')

    {{-- footer --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('script')

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebPage",
          "name": "Midnet Home Networking",
          "description": "Midnet Home Networking merupakan salah satu penyedia layanan internet (ISP) yang berkerja sama dengan penyedia dedicated internet service, Menawarkan beragam paket internet yang terjangkau dengan fokus pada pemasangan, pembayaran dan perawatan koneksi internet. Maulana Idris selaku pemilik Midnet Home Networking mendirikan bisnis pada tahun 2019 Berlokasi di Kampung Kapudang Desa Sukatani.",
          "author": {
            "@type": "Person",
            "name": "Maulana Idris"
          }
        }
    </script>

</body>

</html>
