<!DOCTYPE html>
<html>
	<head>
		<title>@yield("titulo")</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/fa/css/all.css') }}" />
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/especie">Espécie</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/animal">Animal</a>
				</li>
			</ul>
		</nav>
		@if (Session::has("status"))
			<div class="alert alert-success">
				{{ Session::get("status") }}
			</div>
		@endif
		<div class="container">
			<div id="cadastro">
				@yield("cadastro")
			</div>
			<div id="listagem">
				@yield("listagem")
			</div>
		</div>
	</body>
</html>