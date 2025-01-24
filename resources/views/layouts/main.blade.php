<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Code</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layouts.navbar')
    <section>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 py-12">
            @yield('content')
        </div>
    </section>
</body>

</html>
