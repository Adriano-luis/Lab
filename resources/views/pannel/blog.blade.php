@extends('adminlte::page')
@section('content')
<section id="pannel-blog">
    <aside class="couter-articles">
        Total: <b><?php echo sizeOf($articles); ?></b>
    </aside><br>
    <main class="row">
        @foreach ($articles as $article)
            <div class="col-md-3">
                <a href="{{route('blogs.show',$article->urn)}}"> 
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="card-comment d-flex">
                                <span class="userid px-3">
                                    ID: {{$article->id}}
                                </span>
                                <span class="active px-3">
                                    {{$article->active == '1' ? 'Ativo': 'Oculto'}}
                                </span>
                            </div><br>
                            <div class="px-3 title-card">
                                <b><p>{{$article->title}}</p></b>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="px-3">
                                {{$article->description}}
                            </div><br>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </main>
</section>
@endsection