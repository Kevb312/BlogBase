@extends('adminlte::page')

@section('title', 'Admin - Posts')



@section('css')
	<!--<link rel="stylesheet" href="/Tiny/style.css" />-->
	<link rel="stylesheet" type="text/css" href="/css/admin_custom.css">
	


@section('content_header')
    <h1>
    Posts
    <a href="/admin/newPost">
    	    <button type="button" class="btn btn-primary">
        Crear
    </button>
    </a>

	</h1>
@endsection


@section('content')
    <div class="container-fluid">
	    <div class="row">
	        <div class="col-12">
	            <div class="card">
	                <div class="card-header">
	                    <h3 class="card-title">Listado de posts</h3>
	                </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	                <table id="posts" class="table table-bordered table-striped">
	                    <thead>
	                        <tr>
	                            <th>Id</th>
	                            <th>Categoría</th>
	                            <th>Posts</th>
	                            <th>Imagen</th>
	                            <th>Acciones</th>

	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($posts as $post)
		                        <tr>
		                            <td>{{$post->id}}</td>
		                            <td>{{$post->category->name}}
		                            </td>
		                            <td>{{$post->title}}
		                            </td>
		                            <td>
		                            	<img src="{{asset($post->featured)}}" alt="{{$post->title}}" class="img-fluid img-thumbnail" width="100px">
		                            </td>
		                             <td>
		                             		<form action="{{route('admin.editarPosts', $post->id)}}" method="post">
		                             	    	{{csrf_field()}}
		                             			<button class="btn btn-warning">Editar</button>
		                             	
		                             	 	</form>

		                             	    <form action="{{route('admin.posts.delete', $post->id)}}" method="post">
		                             	    	{{csrf_field()}}
		                             	    	@method('delete')
		                             	    	<button class="btn btn-danger">Eliminar</button>

		                             	    </form>
		                             		
		                             </td>
		                        </tr>

		                    		<!-- modal editar-->
								@include('admin.posts.modal-update-post')
		                    @endforeach

	                    </tbody>
	                    <tfoot>
	                        <tr>
	                            <th>Id</th>
	                            <th>Categoría</th>
	                            <th>Posts</th>
	                            <th>Imagen</th>
	                            <th>Acciones</th>
	                        </tr>
	                    </tfoot>
	                </table>
	            </div>
	            <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	        </div>
	        <!-- /.col -->
	    </div>
	    <!-- /.row -->
	</div>

@endsection


@section('js')
<script>
	$(document).ready(function() {
	    $('#posts').DataTable( {
	        "order": [[ 3, "desc" ]]
	    } );
	} );
</script>

@stop