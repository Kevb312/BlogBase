@extends('layouts.layout')

@section('content')

    <!-- seccion 1 -->

    <div id="seccionUno" class="">
    	<div class="container">
    		<div class="row">
    			<h2  id="tituloPost">{{$post->title}}</h2>
    		</div>
    		<div class="row">
    			<h6 style="color: #a67c52;">Por: {{$post->author}}
    		

    		
    			/ Categoría: {{$post->category->name}}
    		

    			</h6>

    			<span class=" card-txt-date" style="color: #a67c52;">Publicado: {{$post->created_at->diffForHumans()}}</span>
    		</div>


    	</div>
    </div>

	<div id="blog">
		<div class="container ">
			<div class="row">
				<div class="col-12">
					<img src="{{asset($post->featured)}}" alt="{{$post->title}}" class="img-fluid" align="center">
				</div>
				
			</div>

			<!-- contenido -->
			<div class="row">
				<div class="col-12">
					<!-- contenido -->
					<span  id="contenidoPost">
						{!!$post->content !!}
					</span>
					
				</div>

			</div>

			<!-- ultimas entradas -->

			<div class="col-12 border-top border-bottom" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 1rem; margin-bottom: 1rem;">
				<div id="ultimasEntradas">
						<h6>Ultimas entradas</h6>
						@foreach($latestPosts as $posts)
							<ul>
								<li>
								<a style="color: #a67c52;" href="{{route('post',$posts->id)}}">{{$posts->title}}</a>
								</li>
							</ul>
			
						@endforeach	
				</div>
			</div>


			<!-- caja de comentarios -->
			<div class="col-12  border-bottom" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 1rem; margin-bottom: 1rem;" id="comentarios">
				<h4>Comentarios</h4>
				@foreach($comments as $c)
					@if($c->enabled == 1)
						<div class="col-12  border-bottom" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 1rem; margin-bottom: 1rem;" id="comentarios">
								<h5 style="color: #828282">{{$c->name}} </h5> 
								<p style="color: #828282">{{$c->created_at}} </p>

								<p style="color: #626262">{{$c->comment}}</p>
						</div>
					@endif
				@endforeach	

			</div>
			

			
		    <div id="comentarios">
		    	<div class="container">
		    		<div class="row">
		    			<div class="col-12" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 1rem; margin-bottom: 1rem;">
		    				<form action="{{route('comentario.posts.store')}}" method="post" enctype="multipart/form-data">
		    					{{csrf_field()}}
							  <div class="mb-3">
							  	<h3>Deja un comentario</h3>
							    <label for="name" class="form-label">Nombre*</label>
							    <input type="text" class="form-control" id="name" name="name"aria-describedby="nombreHelp" required>
							    <div id="nombreHelp" class="form-text">Su nombre.</div>
							  </div>

		  					  <div class="mb-3">
							    <label for="email" class="form-label">Email</label>
							    <input type="email" class="form-control" id="email" aria-describedby="emailhelp" name="email" required>
							    <div id="emailhelp" class="form-text">Correo electronico.</div>
							  </div>

							  <div>
							  	<input type="hidden" name="id_post" value="{{$post->id}}"> 
							  </div>


		  					  <div class="mb-3">
							    
							    <label for="comment" class="form-label">Comentario</label>
		  						<textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
							  </div>


							  <button type="submit" class="btn btn-light" id="comentarioBtn">Comentar</button>

							</form>
		    			</div>
		    		</div>
		    		
		    	</div>
		    </div>
			
	</div>




@endsection