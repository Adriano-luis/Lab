@extends('partials.master')
@section('title')
    Home
@endsection
@section('content')
<section id="first">
    <aside>
        <img src="{{asset('assets/images/left-side.webp')}}" alt="mixed simbols and circles in color of website" title="simbols and circles">
    </aside>
    <div class="middle">
        <div class="container">
            @include('partials.header')
            <div class="infos">
                <h1>Laboratório de <span>estratégias</span> para o seu negócio</h1>
            </div>
            <button>Quero <b>impulsionar</b> a minha <b>empresa</b></button>
            <img class="image-arrow" src="{{asset('assets/images/arrow-down.png')}}" alt="White arrow down ">
        </div>
    </div>
    <aside>
        <img src="{{asset('assets/images/right-side.webp')}}" alt="mixed simbols and circles in color of website" title="simbols and circles">
    </aside>
</section>
<main id="services">
    <div class="container">
        <div class="top-row">
            @foreach ($services as $service)   
                @if ($service->id < 5)     
                    <article>
                        <figure>
                            <img src="{{asset('storage/'.$service->image)}}" alt="{{$service->image_alt}}" title="{{$service->image_title}}">
                        </figure>
                        <h3>{{$service->title}}</h3>
                        <p>{{$service->description}}</p>
                        <a href="#" class="makeContact" value="{{$service->phone}}">Orçamento</a>
                    </article>
                @endif 
            @endforeach
        </div>
        <div class="bottom-row">
            @foreach ($services as $service)   
                @if ($service->id > 4)     
                    <article>
                        <figure>
                            <img src="{{asset('storage/'.$service->image)}}" alt="{{$service->image_alt}}" title="{{$service->image_title}}">
                        </figure>
                        <h3>{{$service->title}}</h3>
                        <p>{{$service->description}}</p>
                        <a href="#" class="makeContact" value="{{$service->phone}}">Orçamento</a>
                    </article>
                @endif 
            @endforeach
        </div>
    </div>
</main>
<section id="about">
    <div class="container">
        <h2>Sobre a <span>Lab Digital Mkt</span></h2>
        <p>
            Oferecemos muito mais que estratégias de marketing digital 360°. Queremos proporcionar uma parceria de sucesso para alavancar o alcance do seu negócio através de estratégias personalizadas que se encaixam nas necessidades da sua empresa e do seu cliente.
        </p>
        <p>
            Ajudamos empresas a garantir seu posicionamento no mercado e adquirir autoridade e reconhecimento do seu público-alvo.
        </p>    
        <p>
            Somos um laboratório criativo de estratégias ideais para o seu negócio.
        </p>
        <p>Ass:</p>
        <p>Isabella Trevison</p>
    </div>
</section>
<section id="blog">
    <div class="container">
        <h2>Blog</h2>
        <div class="two-articles">
            @foreach ($articles as $article)    
                @if($article->id < 3)
                    <article>
                        <h3>{{$article->title}}</h3>
                        <p>{{$article->description}}</p>
                        <a href="{{route('article',['article' => $article->id])}}">Continue Lendo</a>
                    </article>
                @endif
            @endforeach
            <img class="half" src="{{asset('assets/images/half-big-circle.webp')}}" alt="Half big circle blue with middle white">
            <img class="circle" src="{{asset('assets/images/circle-pink-blue.png')}}" alt="Circle blue and pink">
            <img class="circle-yellow" src="{{asset('assets/images/circle-yellow.png')}}" alt="Circle blue, white and yellow">
            <div class="filling"></div>
        </div>
        <div class="four-articles">
            @foreach ($articles as $article)    
                @if($article->id > 2)
                    <article>
                        <h3>{{$article->title}}</h3>
                        <p>{{$article->description}}</p>
                        <a href="{{route('article',['article' => $article->id])}}">Continue Lendo</a>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection