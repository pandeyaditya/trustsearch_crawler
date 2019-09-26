<html>
    <head>
        <title>TrustedSearch Crawler</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <div class="container">
            @yield('content')            
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="footer">
                        &copy; My first search engine <?php echo date('Y') ?>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>

</html>

