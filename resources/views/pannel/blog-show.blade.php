@extends('adminlte::page')
@section('content')
    <main id="pannel-blog-show">
        <aside class="edit">
            <a href="{{route('blogs.edit',$article->id)}}"><button class="btn btn-success">Editar</button></a>
        </aside>
        <section>
            <article class="col box-shadow">
                <header class="row image">
                    <img src="{{asset('storage/'.$article->image)}}" alt="{{$article->image_alt}}" title="{{$article->image_title}}">
                </header>
                <div class="col">
                    <div class="row title-article">
                        <h1>{{$article->title}}</h1>
                    </div>
                    <div class="row info-article">
                        <h2>{{$article->created_at->format('F d,Y')}} - {{$article->author}}</h2>
                    </div><br><br>
                    <div class="row fullText">
                        <?php echo $article->text ?>
                    </div><br>
                    <hr><br><br>
                </div>
            </article>
        </section>
    </main>
@endsection