<!-- Shared header and doctype -->

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- Pass in 'title' from children  -->
    <title>Products - @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <script src=""></script>
</head>
<header class="container-fluid  text-center bg-info pb-2">
    <a href="/products" class="link-success">
        <h1 class="display-1 fw-bold">Squished-Fruit.com</h1>
        <h5 class="lead fw-bold">Your home for squished images of fruit.</h5>
    </a>
    <!-- Display user information and logout button if user is logged in-->
    @auth
        <div class="d-flex justify-content-center align-items-center mt-3">
            <p class="mb-0 text-white me-3 fw-bold">
                Logged in as: {{ auth()->user()->email }} ({{ auth()->user()->role ?? 'User' }})
            </p>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">Logout</button>
            </form>
        </div>
    @endauth
    <!-- If user is not logged in- only necessary on public page, not admin-->
    @guest
        <div class="mt-3">
            <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
        </div>
    @endguest
    <!-- Display errors -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</header>

<body>
    <h2 class="display-3 text-center">@yield('title')</h2>
    <div class="container-fluid">
        <!-- Pass in 'content' from children  -->

        @yield('content')
    </div>
</body>

</html>