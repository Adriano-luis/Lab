@extends('adminlte::page')
@section('content')
    <section class="mostrar">
        <div class="editar">
            <a href="{{route('imprensa.edit',$imprensa->id)}}"><button class="btn btn-success">Editar</button></a>
            <form action="{{route('imprensa.destroy',$imprensa->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
            </form>
        </div>
        <div style="margin: auto; margin-left:28px">
            <div class=" col financial-sombra">
                <div class="row imagem-principal">
                    <div class="overflow">
                        <img src="{{asset('storage/'.$imprensa->img)}}" alt="">
                    </div>
                </div>
                <div class="col financial-textos">
                    <div class="row titulo-texto-imprensa">
                        <h1>{{$imprensa->titulo}}</h1>
                    </div>
                    <div class="row autor-texto-imprensa">
                        {{$imprensa->created_at}} - {{$imprensa->autor}}
                    </div><br><br>
                    <div class="row textoCopleto-texto-imprensa">
                        <?php echo $imprensa->textoCompleto ?>
                    </div><br>
                    <hr><br><br>
                </div>
            </div>
        </div>
    </section>
@endsection