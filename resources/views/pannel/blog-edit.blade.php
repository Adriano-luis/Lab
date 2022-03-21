@extends('adminlte::page')
@section('content')
    @if ($edit)
      <form action="{{route('blogs.update',$article->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @else
        <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group">
            <label for="titulo-imprensa">Titulo</label>
            <input maxlength="53" type="text" class="form-control" id="titulo-imprensa" aria-describedby="titulo" placeholder="Digite o titulo" name="title" value="{{isset($article->title) ? $article->title: '' }}">
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
            <input type="text" class="form-control" id="alt-img" aria-describedby="alt" placeholder="Digite a tag alt da imagem" name="image_alt" value="{{isset($article->image_alt) ? $article->image_alt : ''}}">
            {{ $errors->first('image_alt') ? $errors->first('image_alt') : '' }}
            
            <label for="title-img">Title da imagem</label>
            <input type="text" class="form-control" id="title-img" aria-describedby="autor" placeholder="Digite a tag Title da imagem" name="image_title" value="{{isset($article->image_title) ? $article->image_title : ''}}">
            {{ $errors->first('image_title') ? $errors->first('image_title') : '' }}
          </div>
          <div class="form-group">
            <label for="resumo-imprensa">Resumo</label>
            <textarea maxlength="87" type="text" class="form-control resumo-completo" id="resumo-imprensa" placeholder="Digite o resumo" name="description">{{isset($article->description)? $article->description : ''}}</textarea>
            {{ $errors->first('description') ? $errors->first('description') : '' }}
          </div>
          <div class="form-group">
            <label for="texto-imprensa">Texto completo</label>
            <textarea type="text" class="form-control texto-completo" id="texto-imprensa" placeholder="Digite o texto completo" name="text">{{isset($article->text)? $article->text : ''}}</textarea>
            {{ $errors->first('text') ? $errors->first('text') : '' }}
          </div>
          <div class="form-group">
            <label for="autor-imprensa">Autor</label>
            <input type="text" class="form-control" id="autor-imprensa" aria-describedby="autor" placeholder="Digite o nome do autor" name="author" value="{{isset($article->author) ? $article->author : ''}}">
            {{ $errors->first('author') ? $errors->first('author') : '' }}
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    <script src="https://cdn.tiny.cloud/1/eqd8b193ir437iordcerkybra8fcx7svmezrrogqa6ra7ygq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#texto-imprensa',
        plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
        mobile: {
          plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
        },
        menubar: 'file edit view insert format tools table tc help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [
          { title: 'My page 1', value: 'https://www.tiny.cloud' },
          { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_list: [
          { title: 'My page 1', value: 'https://www.tiny.cloud' },
          { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_class_list: [
          { title: 'None', value: '' },
          { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        templates: [
              { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
          { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
          { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
        tinycomments_mode: 'embedded',
        content_style: '.mymention{ color: gray; }',
        contextmenu: 'link image imagetools table configurepermanentpen',
        a11y_advanced_options: true,
        content_css: 'default',
        mentions_selector: '.mymention',
        mentions_item_type: 'profile'
      });
    </script>
@endsection