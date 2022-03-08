<!doctype html>
<html lang = "{{ app()->getLocale() }}">
    <head>
        <meta charset = "UTF-8">
        <title>Money Opportunity</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" id="bootstrap-css"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('css/main.css?v=1.00') }}">
    </head>
    <body>
        <header>
            @section('header')
                @include('header')
            @show
        </header>
        
        <div id="body">
            @yield('body')
        </div>
        
        @section('footer')
            @include('footer')
        @show
    </body>
</html>