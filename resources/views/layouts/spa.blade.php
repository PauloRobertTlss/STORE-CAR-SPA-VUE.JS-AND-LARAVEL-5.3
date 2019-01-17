<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LavPos</title>
    <script>
        window.Laravel =; <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@if (getenv('APP_ENV') === 'local')
    <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.6'><\/script>".replace("HOST", location.hostname));
        //]]>
    </script>
@endif
<div id="app-container"></div>
<!-- Scripts -->
<script src="{{asset('build/store.bundle.js')}}"></script>
</body>
</html>
