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
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ trans('BIK PERFUME') }}</a>

        <!-- الروابط -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('perfume.index') }}">@lang('Perfumes')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('sperto.index') }}">@lang('Sperto')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('glass.index') }}">@lang('Glass')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('company.index') }}">@lang('Companies')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('customer.index') }}">@lang('Customers')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('order.index') }}">@lang('Orders')</a></li>
            </ul>

            <!-- Dropdown لاختيار للغة -->
            <form action="{{ route('lang.switch', app()->getLocale()) }}" method="GET" onchange="this.submit()">
                <select name="locale" onchange="window.location.href='{{ url('lang') }}/' + this.value" class="form-select form-select-sm w-auto">
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                </select>
</form>


            <!-- Dropdown لاسم المستخدم -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">{{ __('Logout') }}</button>
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
            <a href="{{ route('login') }}" class="btn btn-primary m-1">{{ __('Login')}}</a>
            <a href="{{ route('register') }}" class="btn btn-secondary m-1">{{__('Register')}}</a>
        @endguest

        <form class="d-flex justify-content-center mt-3">
            <input class="form-control w-25 me-2" type="search" placeholder="{{ __('Searches') }}" />
            <button class="btn btn-outline-success" type="submit">{{ __('Search') }}</button>
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
