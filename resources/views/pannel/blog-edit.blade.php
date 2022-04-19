@extends('adminlte::page')
@section('content')
  <main id="pannel-blog-edit">
    @if ($exist)
        <div class="exist">Matéria já existe!</div>
    @endif
    @if ($edit)
      <form action="{{route('blogs.update',$article->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @else
        <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group title">
            <label for="titile">Titulo da Máteria</label>
            <input type="text" class="form-control" id="titile" aria-describedby="titulo" placeholder="Digite o titulo" name="title" value="{{isset($article->title) ? $article->title: '' }}">
            {{ $errors->first('title') ? $errors->first('title') : '' }}
        </div><hr>
          @if ($edit)
          <div class="form-group title">
            <label for="titile">URN</label>
            <input type="text" class="form-control" id="URN" aria-describedby="URN" placeholder="Digite a URN" name="urn" value="{{isset($article->urn) ? $article->urn: '' }}">
            {{ $errors->first('urn') ? $errors->first('urn') : '' }}
          </div><hr>
          @endif
          <div class="form-group image">
            <label for="image">Imagem da Matéria</label><br>
            <div class="thumb">
              <img id="show-image" src="{{isset($article->image) ? asset('storage/'.$article->image) : asset('assets/images/thumb.jpeg')}}">
            </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" >
                        <label name="upFotos" class="custom-file-label" for="image">
                            Click para procurar em seu dispositivo Tam: 920 x 575
                        </label>
                    </div>
                </div>
                {{ $errors->first('image') ? $errors->first('image') : '' }}
          </div>
          <div class="form-group tags">
            <label for="alt-img">Alt da imagem</label>
            <input type="text" class="form-control" id="alt-img" aria-describedby="alt" placeholder="Digite a tag alt da imagem" name="image_alt" value="{{isset($article->image_alt) ? $article->image_alt : ''}}">
            {{ $errors->first('image_alt') ? $errors->first('image_alt') : '' }}
            
            <label for="title-img" class="label-title-image">Title da imagem</label>
            <input type="text" class="form-control" id="title-img" aria-describedby="title-image" placeholder="Digite a tag Title da imagem" name="image_title" value="{{isset($article->image_title) ? $article->image_title : ''}}">
            {{ $errors->first('image_title') ? $errors->first('image_title') : '' }}
          </div><hr>
          <div class="form-group description">
            <label for="description">Resumo</label>
            <textarea maxlength="88" type="text" class="form-control" id="description" placeholder="Digite o resumo" name="description">{{isset($article->description)? $article->description : ''}}</textarea>
            {{ $errors->first('description') ? $errors->first('description') : '' }}
          </div>
          <div class="form-group text">
            <label for="text">Texto completo</label>
            <textarea type="text" class="form-control" id="text" placeholder="Digite o texto completo" name="text">{{isset($article->text)? $article->text : ''}}</textarea>
            {{ $errors->first('text') ? $errors->first('text') : '' }}
          </div>
          <div class="form-group author">
            <label for="author">Autor</label><br>
            <input type="checkbox" name="useAuthor" {{isset($article->author) && $article->author === auth()->user()->name ? 'checked':''}}><span> Usar autor: {{auth()->user()->name }}</span><br><br>
            <p>Outro:</p>
            <input type="text" class="form-control" id="author" aria-describedby="autor" placeholder="Digite o nome do autor" name="author" value="{{isset($article->author) ? $article->author : ''}}">
            {{ $errors->first('author') ? $errors->first('author') : '' }}
          </div>
          <div class="form-group active">
            <label for="active">Ativo/oculto</label>
            <input type="checkbox" class="form-control active" id="active" name="active" {{isset($article->active) && $article->active === '1' ? 'checked':''}}>
            {{ $errors->first('active') ? $errors->first('active') : '' }}
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
    </form>
  </main>
    <script src="https://cdn.tiny.cloud/1/eqd8b193ir437iordcerkybra8fcx7svmezrrogqa6ra7ygq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#text',
        plugins: 'print preview importcss tinydrive searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        mobile: {
          plugins: 'print preview importcss tinydrive searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons'
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