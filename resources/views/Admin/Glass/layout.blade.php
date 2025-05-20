<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfume | BIK.Perfume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <br>

    <!-- Navigation Links -->
    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- شعار أو اسم الموقع -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">BIK PERFUME</a>

        <!-- الروابط -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('perfume.index') }}">Perfumes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('sperto.index') }}">Sperto</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('glass.index') }}">Glass</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('company.index') }}">Companies</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('customer.index') }}">Customers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('order.index') }}">Orders</a></li>
            </ul>

            <!-- Dropdown لاسم المستخدم -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endauth

        @guest
            <a href="{{ route('login') }}" class="btn btn-primary m-1">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary m-1">Register</a>
        @endguest

        <form class="d-flex justify-content-center mt-3">
            <input class="form-control w-25 me-2" type="search" placeholder="Search ..." />
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav>

    <!-- Page Content -->
    <div class="container mt-4">
        @yield('content')  
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
