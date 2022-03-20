@extends('adminlte::page')
@section('content')
<section class="blog">
    <div>
        Total: <?php echo count($article); ?>
    </div><br>
    <main class="row">
        @foreach ($articles as $imprensa)
            <div class="col-md-3">
                <a href="{{route('imprensa.show',$imprensa->id)}}"> 
                    <div class="card card-widget">
                        <div class="card-header">
                            <span class="description">
                                <img style="width: 215px" src="{{asset('storage/'.$imprensa->img)}}" alt="">
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="card-comment d-flex">
                                <span class="username px-3">
                                    ID: {{$imprensa->id}}
                                </span>
                            </div><br>
                            <div class="px-3 titulo-card-imprensa">
                                    <b><p>{{$imprensa->titulo}}</p></b>
                            </div>
                            <div class="px-3">
                                    {{$imprensa->resumo}}
                            </div><br>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </main>
</section>
@endsection