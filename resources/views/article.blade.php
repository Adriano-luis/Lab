@extends('partials.master')

@section('title')
Artigo
@endsection
@section('content')
<div id="article">
    <div class="top">
        <aside>
            <img src="{{asset('assets/images/contact-left.png')}}" alt="Mistura de símbolos e círculos na cor do site" title="Símbolos e círculos">
        </aside>
        <div class="middle">
            <div class="container">
                @include('partials.header')
                <h1>Blog</h1>
            </div>
        </div>
        <aside>
            <img src="{{asset('assets/images/contact-right.png')}}" alt="Mistura de símbolos e círculos na cor do site" title="Símbolos e círculos">
        </aside>
    </div>
    <main class="main-article">
        <img src="{{asset('storage/'.$article->image)}}" alt="{{$article->image_alt}}" title="{{$article->image_title}}">
        <h2>{{$article->title}}</h2>

        <div class="infos-articles">
            <span><img src="{{asset('assets/images/calendar.png')}}" alt="Icone de calendário na cor rosa" title="Calendário rosa"> {{$article->created_at->format('F d,Y')}}</span>
            <span><img src="{{asset('assets/images/user.webp')}}" alt="Icone de usuário na cor rosa" title="Usuário rosa"> Post by: {{$article->author}}</span>
        </div>

        <div class="full-text">
            <?php echo $article->text ?>
        </div>
    </main>
</div>
@endsection