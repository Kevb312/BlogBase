@extends('adminlte::page')

@section('title', 'Gestionar comentarios')

@section('css')
	<!--<link rel="stylesheet" href="/Tiny/style.css" />-->
	
	<link rel="stylesheet" type="text/css" href="/css/admin_custom.css">


@section('content_header')


	<h4>Gestionar comentarios</h4>
@endsection


@section('content')
	
    <div class="container-fluid">
	    <div class="row">
	        <div class="col-12">
	            <div class="card">
	                <div class="card-header">
	                    <h3 class="card-title">Listado de comentarios para aprobación</h3>
	                </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	                <table id="comments" class="table table-bordered table-striped">
	                    <thead>
	                        <tr>
	                            <th>Id</th>
	                            <th>Nombre</th>
	                            <th>Email</th>
	                            <th>Comentario</th>
	                            <th>Fecha de creación</th>
	                            <th>Post</th>
	                            <th>Aprobado</th>
	                            <th>Acciones</th>

	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($comments as $c)
		                        <tr>
		                            <td>{{$c->id}}</td>
		                            <td>{{$c->name}}</td>
		                            <td>{{$c->email}}</td>
		                            <td>{{$c->comment}}</td>
		                            <td>{{$c->created_at}}</td>
		                            <td>{{$c->post_id}}</td>
		                            <td> @if ($c->enabled == 1)
		                            		Aprobado
		                            	@else
		                            		No aprobado

		                            	@endif

		                            </td>
	                             	<td>
	                             			
                             			<form action="{{route('admin.comment.aprobar', $c->id)}}" method="post">
		                             	    	{{csrf_field()}}
	                             			<button class="btn btn-success" >Aprobar</button>
	                             		</form>

	                             		<form action="{{route('admin.comment.noAprobar', $c->id)}}" method="post">
		                             	    	{{csrf_field()}}
	                             			<button class="btn btn-warning" >Ocultar</button>
	                             		</form>

	                             	    <form action="{{route('admin.comment.delete', $c->id)}}" method="post">
		                             	    	{{csrf_field()}}
		                             	    	@method('delete')
		                             	    	<button class="btn btn-danger">Eliminar</button>

	                             	    </form>
		                             		
		                             </td>
		                        </tr>

		                    @endforeach
	                    </tbody>
	                    <tfoot>
	                        <tr>
	                            <th>Id</th>
	                            <th>Nombre</th>
	                            <th>Email</th>
	                            <th>Comentario</th>
	                            <th>Fecha de creación</th>
	                            <th>Post</th>
	                            <th>Aprobado</th>
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
	    $('#comments').DataTable( {
	        "order": [[ 3, "desc" ]]
	    } );
	} );
</script>


@stop