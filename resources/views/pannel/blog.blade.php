@extends('adminlte::page')
@section('content')
<section id="pannel-blog">
    <div class="couter-articles">
        Total: <b><?php echo sizeOf($articles); ?></b>
    </div><br>
    <main class="row">
        @foreach ($articles as $article)
            <div class="col-md-3">
                <a href="{{route('blogs.show',$article->id)}}"> 
                    <div class="card card-widget">
                        <div class="card-header">
                            <span class="description">
                                <img style="width: 215px" src="{{asset('storage/'.$article->image)}}" alt="{{$article->image_alt}}" title="{{$article->image_title}}">
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="card-comment d-flex">
                                <span class="username px-3">
                                    ID: {{$article->id}}
                                </span>
                            </div><br>
                            <div class="px-3 titulo-card-imprensa">
                                    <b><p>{{$article->title}}</p></b>
                            </div>
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