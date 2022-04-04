<header>
    <a href="{{route('home')}}"><img src="{{asset('assets/images/Logo-lab.webp')}}" alt="Logo do site Lab" title="Logo"></a>
    <nav id="menu">
        <ul>
            <li><a class="pageScroll" href="#services" aria-label="services">Serviços</a></li>
            <li><a class="pageScroll" href="#about" aria-label="about">Sobre</a></li>
            <li><a class="pageScroll" href="#blog" aria-label="blog">Blog</a></li>
            <li><a href="{{route('contact')}}">Contato</a></li>
        </ul>
    </nav>
    <img class="icon-mobile" src="{{asset('assets/images/menu.png')}}" alt="Icone de menu para mobile" title="Menu mobile" onclick="toggleMenu()">
    <nav id="mobile">
        <div id="submenu">
            <a class="pageScroll" href="#services" aria-label="services">Serviços</a>
            <a class="pageScroll" href="#about" aria-label="about">Sobre</a>
            <a class="pageScroll" href="#blog" aria-label="blog">Blog</a>
            <a href="{{route('contact')}}">Contato</a>
        </div>
    </nav>
</header>