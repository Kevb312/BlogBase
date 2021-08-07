<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
</head>
<body>

	<!-- Navigation-->
    <nav class="navbar navbar-expand-lg  text-uppercase fixed-top  border-bottom" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/">El oasis blog</a>

            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/">Blog</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#">Portafolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#">Acerca de</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--contenido -->

    @yield('content')@section('content')



	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>El oasis blog</h1>
					<p>El oasis blog es un proyecto que pretende ser una carpeta de evidencias así como un blog sobre cosas personales y experiencias compartidas.</p>
				</div>

				<div class="col-md-4">
					<h5>Categorías</h5>
					<ul>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Portafolio</a></li>
						<li><a href="#">Acerca de mi</a></li>
					</ul>
				</div>

				<div class="col-md-4">
					<h5>Otros enlaces</h5>
					<ul>
						<li><a href="#">Blog</a></li>
					</ul>
				</div>
			</div>

			<div class="row" id="copy">
				<div class="col-12">
					<center>
					Copyright © El oasis blog. Todos los derechos reservados
					</center>
				</div>
			</div>
		</div>
	</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>