<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servent</title>
    <link rel="icon" type="image/png" href="{{asset('logo.png')}}">
    <link rel="stylesheet" href="{{asset('css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/all.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/style.css">
    <script src="{{asset('js')}}/bootstrap.bundle.min.js" defer></script>
    @livewireStyles
    <style>
        body {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body class="text-center">

    <livewire:login />

    @livewireScripts
</body>
</html>
