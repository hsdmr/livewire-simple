<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servent</title>
    <link rel="stylesheet" href="{{asset('css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/all.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/style.css">
    <script src="{{asset('js')}}/bootstrap.bundle.min.js" defer></script>
    @livewireStyles
</head>
<body class="text-center max-330">
    <livewire:head />
    <br>
    <br>
    <br>
    <br>
    <a class="btn btn-info my-2 w-75 btn-lg" href="/post">Postlar</a>
    <a class="btn btn-info my-2 w-75 btn-lg" href="/category">Kategoriler</a>
    <a class="btn btn-info my-2 w-75 btn-lg" href="/user">Kullanıcılar</a>

    @livewireScripts
</body>
</html>
