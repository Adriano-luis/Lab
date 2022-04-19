@extends('partials.master')

@section('title')
Blog
@endsection
@section('content')
<section id="blogs">
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
    <div class="blogs-main" id="blogs-main">
        @foreach ($articles as $article)  
            @if($article->active == 1)
                <article>
                    <h3>{{$article->title}}</h3>
                    <p>{{$article->description}}</p>
                    <a href="{{route('article',['article' => $article->urn])}}">Continue Lendo</a>
                </article>
            @endif  
        @endforeach
    </div>
</section>
@endsection