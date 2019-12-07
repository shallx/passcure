<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passcure</title>
    {{-- <link rel="icon" href="images/padlock.png" type="image/png"> --}}
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('inc.navbar')
    <div class="container" id="full_container">
        <div class="content">
            @include('inc.message')
            @yield('content')
        </div>
    </div>

    @include('inc.footer')
    
    <script type="text/javascript" src="/js/app.js">

    </script>
    @yield('customscript')

</body>
</html>