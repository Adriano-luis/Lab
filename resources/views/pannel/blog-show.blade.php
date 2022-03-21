@extends('adminlte::page')
@section('content')
    <section id="pannel-show">
        <div class="editar">
            <a href="{{route('blogs.edit',$article->id)}}"><button class="btn btn-success">Editar</button></a>
        </div>
        <div style="margin: auto; margin-left:28px">
            <div class=" col financial-sombra">
                <div class="row imagem-principal">
                    <div class="overflow">
                        <img src="{{asset('storage/'.$article->image)}}" alt="{{$article->image_alt}}" title="{{$article->image_title}}">
                    </div>
                </div>
                <div class="col financial-textos">
                    <div class="row titulo-texto-imprensa">
                        <h1>{{$article->title}}</h1>
                    </div>
                    <div class="row autor-texto-imprensa">
                        {{$article->created_at}} - {{$article->author}}
                    </div><br><br>
                    <div class="row textoCopleto-texto-imprensa">
                        <?php echo $article->text ?>
                    </div><br>
                    <hr><br><br>
                </div>
            </div>
        </div>
    </section>
@endsection