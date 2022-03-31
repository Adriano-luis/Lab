@extends('partials.master')
@section('title')
    Contato
@endsection

@section('content')
<section id="contact">
    <div class="top">
        <aside>
            <img src="{{asset('assets/images/contact-left.png')}}" alt="Mistura de símbolos e círculos na cor do site" title="Símbolos e círculos">
        </aside>
        <div class="middle">
            <div class="container">
                @include('partials.header')
                <h1>Contato</h1>
            </div>
        </div>
        <aside>
            <img src="{{asset('assets/images/contact-right.png')}}" alt="Mistura de símbolos e círculos na cor do site" title="Símbolos e círculos">
        </aside>
    </div>
    <div class="contact-main">
        <form action="">
            <input type="text" name="name" placeholder="Nome:">
            <input type="text" name="email" placeholder="Email:">
            <input type="text" name="phone" placeholder="Telefone:">
            <textarea name="message" placeholder="Menssagem:"></textarea>
            <input type="submit" class="submit"value="Enviar">
        </form>
    </div>
</section>
@endsection