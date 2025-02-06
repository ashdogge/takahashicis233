<!-- Shared header and doctype -->

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- Pass in 'title' from children  -->
    <title>Admin Products - @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <script src=""></script>
</head>
<header class="container-fluid  text-center bg-danger pb-2">
    <a href="{{route('admin.products.index')}}" class="link-dark">
        <h1 class="display-1 fw-bold">Squished-Fruit.com ADMIN</h1>
        <h5 class="lead fw-bold">Your home for ~~managing~~ images of fruit.</h5>
    </a>
</header>

<body>
    <h2 class="display-3 text-center">@yield('title')</h2>
    <div class="container-fluid">
        @if(session()->get('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <!-- Pass in 'content' from children  -->

        @yield('content')
    </div>
</body>

</html>