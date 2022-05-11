<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- GTM -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5BK4WMN');
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4546DD83F0"></script>
    <!-- Global site tag (gtag.js) - Google Ads --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10895158474"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-10895158474'); </script>
    <!-- Google Analytics -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-4546DD83F0');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '360825966111337'); 
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
        src="https://www.facebook.com/tr?id=360825966111337&ev=PageView
        &noscript=1"/>
    </noscript>
    <meta name="google-site-verification" content="Wexi5zZTQ3ALDGeiDt6ZB5SFEpHp0Z4ORrIbhangioU" />
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
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BK4WMN"
        height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
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