@extends('adminlte::page')
@section('content')
    @if ($edit)
      <form action="{{route('services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @else
        <form action="{{route('services.store')}}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group">
            <label for="titulo-imprensa">Titulo</label>
            <input maxlength="23" type="text" class="form-control" id="titulo-imprensa" aria-describedby="titulo" placeholder="Digite o titulo" name="title" value="{{isset($service->title) ? $service->title: '' }}">
            {{ $errors->first('title') ? $errors->first('title') : '' }}
          </div>
          <div class="form-group">
            <label for="imagem-imprensa">Imagem da imprensa</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="imagem-imprensa" >
                        <label name="upFotos" class="custom-file-label" for="imagem-imprensa">
                            Click para procurar em seu dispositivo Tam: 920 x 575
                        </label>
                    </div>
                </div>
                {{ $errors->first('image') ? $errors->first('image') : '' }}
          </div>
          <div class="form-group">
            <label for="alt-img">Alt da imagem</label>
            <input type="text" class="form-control" id="alt-img" aria-describedby="alt" placeholder="Digite a tag alt da imagem" name="image_alt" value="{{isset($service->image_alt) ? $service->image_alt : ''}}">
            {{ $errors->first('image_alt') ? $errors->first('image_alt') : '' }}
            
            <label for="title-img">Title da imagem</label>
            <input type="text" class="form-control" id="title-img" aria-describedby="autor" placeholder="Digite a tag Title da imagem" name="image_title" value="{{isset($service->image_title) ? $service->image_title : ''}}">
            {{ $errors->first('image_title') ? $errors->first('image_title') : '' }}
          </div>
          <div class="form-group">
            <label for="resumo-imprensa">Resumo</label>
            <textarea maxlength="88" type="text" class="form-control resumo-completo" id="resumo-imprensa" placeholder="Digite o resumo" name="description">{{isset($service->description)? $service->description : ''}}</textarea>
            {{ $errors->first('description') ? $errors->first('description') : '' }}
          </div>
          <div class="form-group">
            <label for="autor-imprensa">Telefone</label><br>
            <input type="checkbox" name="usePhone" {{$service->phone === auth()->user()->phone ? 'checked':''}}><span> Usar telefone: {{auth()->user()->phone}}</span><br><br>
            <p>Outro:</p>
            <input type="text" class="form-control" id="autor-imprensa" aria-describedby="autor" placeholder="Digite sem espaços ou carácteres especiais" name="phone" value="{{isset($service->phone) ? $service->phone : ''}}">
            {{ $errors->first('phone') ? $errors->first('phone') : '' }}
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection