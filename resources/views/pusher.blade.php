<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="content">
        <div class="m-b-md">
            New notification will be alerted realtime!
        </div>
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>

<script>
    console.log('pusher');
    Echo.channel(`user.{{$userId}}`)
        .listen('.userdata', (e) => {
            console.log('event works');
            console.log(e);
        });
</script>


</body>
</html>
