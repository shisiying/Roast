<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>Roast</title>

    <script type='text/javascript'>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div id="app">
    <router-view></router-view>
</div>
<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.15&key=b83abb3e118bde9ab6814bc14b762df3"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>