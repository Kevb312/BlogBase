
@extends('layouts.layout')

@section('content')

    <!-- seccion 1 -->

    <div id="seccionUno" class="border-bottom">
    	<div class="container">
    		<div class="row">
    			<a href="#"><h3>¿Que hay de nuevo?</h3></a>

    		</div>
    	</div>
    </div>

    <!-- seccion blogs -->

    <div id="blogs" >
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 border-bottom">
    				<!-- 1 -->

    				@foreach($posts as $post)
    					<div class="card mb-3" style="max-width: 540px;">
						  <div class="row g-0">
						    <div class="col-md-4">
						      <img src="{{asset($post->featured)}}" id="imgBlog" class="img-fluid rounded-start" alt="{{$post->name}}">
						    </div>
						    <div class="col-md-8">
						      <div class="card-body">
						        <h4 class="card-title">{{$post->title}}</h4>
						        <p id="cate">Categoría: {{$post->category->name}} </p>
						        <p id="by">Por {{$post->author}}</p>
						        <p class="card-text">{{$post->descripcion}}</p>
						        <h5><a href="{{route('post', $post->id)}}">Leer más</a></h5>
						        <span class=" card-txt-date">{{$post->created_at->diffForHumans()}}</span>
						      </div>
						    </div>
						  </div>
						</div>
    				@endforeach

    			<div class="mb-3" style="max-width: 540px;">
    				<div class="d-grid gap-2">
						  <button class="btn btn-light" type="button" id="botonUno">Ver más
						  </button>

					</div>
    			</div>
    			</div>


    			<!-- cajas derecha de categorías-->

				<div class="col-md-4 border-left" id="cards">
					<h4 style="color: #888888">Categorías del blog</h4>
					<h5><a href="/" class="selected-category">Todas las categorías</a> </h5>
					@foreach($categories as $category)
	    				<div class="card text-center" style="width: 15rem;">
    						<a href="{{route('post.category', $category->name)}}" >
						  		<img src="{{asset($category->featured)}}" class="img-thumbnail rounded mx-auto d-block" alt="{{$category->name}}" width="100">
						  	</a>
						  <div class="card-body">
						    <h6 class="card-title">{{$category->name}}</h6>
						    <!--<p class="card-text" >Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
						    <a href="{{route('post.category', $category->name)}}" >Vamos</a>
						  </div>
						</div>
					@endforeach
				</div>

    		</div>

    	</div>
    </div>

    <!-- seccion contacto -->
    <div id="contacto">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<form>
					  <div class="mb-3">
					  	<h1>Contacto</h1>
					    <label for="nombre" class="form-label">Nombre</label>
					    <input type="text" class="form-control" id="nombre" name="nombre"aria-describedby="nombreHelp">
					    <div id="nombreHelp" class="form-text">Su nombre.</div>
					  </div>

					  <div class="mb-3">
					    <label for="telefono" class="form-label">Telefono</label>
					    <input type="text" class="form-control" id="telefono" aria-describedby="telefonohelp">
					    <div id="telefonohelp" class="form-text">Su número telefonico.</div>
					  </div>

  					  <div class="mb-3">
					    <label for="email" class="form-label">Email</label>
					    <input type="email" class="form-control" id="email" aria-describedby="emailhelp">
					    <div id="emailhelp" class="form-text">Su correo electronico.</div>
					  </div>


  					  <div class="mb-3">
					    
					    <label for="mensaje" class="form-label">Mensaje</label>
  						<textarea class="form-control" id="mensaje" rows="3"></textarea>
					  </div>


					  <button type="submit" class="btn btn-light">Enviar mensaje</button>

					</form>
    			</div>
    		</div>
    		
    	</div>
    </div>
@endsection