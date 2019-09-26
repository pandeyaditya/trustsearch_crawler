<html>
    <head>
        <title>TrustedSearch Crawler</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
<div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top:100px;">
                    @include('form')
                <hr>
            </div>
        </div>
    </div>
@yield('content')

<div class="footer" style="position:fixed;bottom:0px;margin-bottom:10px">
    &copy; My first search engine <?php echo date('Y') ?>
</div>
</body>

</html>

