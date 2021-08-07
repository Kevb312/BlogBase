@extends('adminlte::page')

@section('title', 'Editar post')

@section('css')
	<!--<link rel="stylesheet" href="/Tiny/style.css" />-->
	
	<link rel="stylesheet" type="text/css" href="/css/admin_custom.css">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@section('content_header')


	<h4>Editar Post</h4>
@endsection


@section('content')
	
	<div id="actualizar{{$post->id}}">
	    <form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
	        	{{csrf_field()}}
		    	
		        <div class="form-group">
		        	<label for="title">Titulo</label>
		        	<input type="text" name="title" class="form-control" id="title" required value="{{$post->title}}">
		        </div>

		        <div class="form-group">
		        	<label for="category_id">Categoría</label>
		        	<select name="category_id" id="category_id" class="form-control" required>
		        		<option value="">-- Elegir categoría --</option>
		        		@foreach($categories as $category)
		        			<option value="{{$category->id}}"> {{$category->name}}</option>
		        		@endforeach
		        	</select>
		        </div>

    	        <div class="form-group">
		        	<label for="descripcion">Descripción (Un pequeño texto que se mostrará en principal)</label>
		        	<textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="2" required> {{$post->descripcion}}</textarea>
		        </div>

		        <div class="form-group" >
			        <label for="content">Contenido</label>
			        <div id="containerT" style=" height: 300px;" name="containerT">
			        	
			        	{!!$post->content!!}
			        </div>
			        <textarea name="content" class="form-control" id="content" cols="30" rows="10" required style="display:none;"> </textarea>
		    	</div>

		        <div class="form-group">
		        	<label for="author">Autor</label>
		        	<input type="text" name="author" class="form-control" id="author" required value="{{$post->author}}">
		        </div>

		        <div class="form-group">
		        	<label for="featured">Imagen principal (Nota: el nombre del archivo no tiene que pasar de los 50 caracteres)</label>
		        	<input type="file" name="featured" class="form-control" id="featured" >
		        </div>


		        
		        <button type="submit" class="btn btn-outline-primary" onclick="jsSave()">Guardar</button>
	       
	    </form>
	</div>

@endsection

@section('js')

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean'],                                         // remove formatting button
            ['image']
        ];

  var quill = new Quill('#containerT', {
    modules: {
                toolbar: {
                    container: toolbarOptions,
                    handlers: {
                        image: imageHandler
                    }
                }
            },
	  placeholder: 'Escribe algo :)...',
	  theme: 'snow'  // or 'bubble'
  });

  function imageHandler() {
            var range = this.quill.getSelection();
            var value = prompt('What is the image URL');
            if(value){
                this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
            }
        }

  function jsSave(){
  		let contenido = quill.container.firstChild.innerHTML;

  		document.getElementById('content').innerHTML  = contenido;
  		
  		alert("Se ha editado un post");
  }
</script>

@stop