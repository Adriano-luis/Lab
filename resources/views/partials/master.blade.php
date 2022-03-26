<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('assets/images/Logo-lab.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/template.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
</head>
<body>
    
    @yield('content')
    @include('partials.footer')
    <script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>