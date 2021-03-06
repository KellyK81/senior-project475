<!doctype html>
<html lang = "{{ app()->getLocale() }}">
    <head>
        <meta charset = "UTF-8">
        <title>Money Opportunity</title>
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" id="bootstrap-css"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('css/main.css?v=1.01') }}">

        @if (Route::currentRouteName() == 'calculator')
            <link rel="stylesheet" href="{{ asset('css/calculator.css?v=1.00') }}">
        @endif

    </head>
    <body>
        
        <div id="page-top">
            @yield('body')
        </div>
        
        @section('footer')
            @include('footer')
        @show
    </body>
</html>