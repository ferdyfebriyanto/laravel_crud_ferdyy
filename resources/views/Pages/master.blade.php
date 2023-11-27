<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">

    <!-- Styles -->
    {{-- Mengubah link href ke folder public asset --}}
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    {{-- Menambahkan css datatables --}}
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">


    <style>
        main {
            min-height: 100vh;
        }

        header {
            position: relative;
            height: 56px;
        }

        .navbar-brand {
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/logo.png') }}"
                        alt="" height="30" class="rounded-circle"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="py-3 bg-dark fixed-bottom">
        <p class="text-center text-white">
            Created with <i class="bi bi-heart-fill text-danger"></i> by Ferdy Febriyanto
        </p>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Menambahkan js extension sweetalert --}}
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
</body>

</html>
