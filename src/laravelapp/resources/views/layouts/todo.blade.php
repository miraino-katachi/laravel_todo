<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    @yield('style')
</head>

<body>
    <div class="container-md my-3">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>@yield('title')</h1>
                @yield('content')
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>

</html>
