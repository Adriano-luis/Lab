<header>
    <a href="{{route('home')}}"><img src="{{asset('assets/images/Logo-lab.webp')}}" alt="Logo do site Lab" title="Logo"></a>
    <nav id="menu">
        <ul>
            <li><a class="pageScroll" href="#services" aria-label="services">serviços</a></li>
            <li><a class="pageScroll" href="#about" aria-label="about">sobre</a></li>
            <li><a class="pageScroll" href="#blog" aria-label="blog">blog</a></li>
            <li><a href="{{route('contact')}}">contato</a></li>
        </ul>
    </nav>
    <img class="icon-mobile" src="{{asset('assets/images/menu.png')}}" alt="Icone de menu para mobile" title="Menu mobile" onclick="toggleMenu()">
    <nav id="mobile">
        <div id="submenu">
            <a class="pageScroll" href="#services" aria-label="services">serviços</a>
            <a class="pageScroll" href="#about" aria-label="about">sobre</a>
            <a class="pageScroll" href="#blog" aria-label="blog">blog</a>
            <a href="{{route('contact')}}">contato</a>
        </div>
    </nav>
</header>