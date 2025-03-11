<!-- Shared header and doctype -->
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- Pass in 'title' from children  -->
    <title>LUA helper @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src='main.js'></script>
    <script src=""></script>
    @livewireStyles
</head>

<body>
    <div>
        <div class="container-fluid gptRes">
            <!-- Pass in 'content' from children  -->
            @yield('content')
        </div>
        @livewireScripts
    </div>
</body>

</html>