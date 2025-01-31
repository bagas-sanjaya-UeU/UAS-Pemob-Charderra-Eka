<nav class="navbar navbar-expand-lg bg-body-tertiary p-1" style="background-color: #d8fdd1 !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
           <h5>Donasi Kita</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#app">Apps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{
                        route('login')
                    }}">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
