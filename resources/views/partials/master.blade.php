<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="URL_BASE" content="{{ url('/') }}">
    <title>Lab. Digital Marketing - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('assets/images/Logo-lab.webp')}}">
    <link rel="stylesheet" href="{{asset('assets/css/template.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
</head>
<body>
    @yield('content')
    <aside class="whatsapp makeContact">
        <figure>
            <img src="{{asset('assets/images/whatsapp.webp')}}" alt="Icone do WhatsApp" title="WhatsApp">
        </figure>
    </aside>
    @include('partials.footer')
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>