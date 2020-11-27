@extends("layout.master")

@section("titulo", "Espécie")

@section("cadastro")

	<h1>Espécie</h1>

	<form method="POST" action="/especie">
		@csrf
		<input type="hidden" name="id" value="{{ $especie->id }}" />
		<div class="row">
			<div class="col-8 form-group">
				<label for="descricao">Descrição:</label>
				<input type="text" name="descricao" value="{{ $especie->descricao }}" class="form-control" />
			</div>
			<div class="col-4">
				<button class="btn btn-success botoes" type="submit">
					<i class="fa fa-save"></i>
					Salvar
				</button>
				<a class="btn btn-primary botoes" href="/especie">
					<i class="fa fa-plus"></i>
					Novo
				</a>
			</div>
		</div>
	</form>
@stop

@section("listagem")
	<table class="table table-striped">
		<colgroup>
			<col width="600">
			<col width="200">
			<col width="200">
		</colgroup>	
		<thead>
			<tr>
				<th>Descrição</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($especies as $especie)
				<tr>
					<td>{{ $especie->descricao }}</td>
					<td>
						<a href="/especie/{{ $especie->id }}/edit" class="btn btn-warning">
							<i class="fa fa-edit"></i>
							Editar
						</a>
					</td>
					<td>
						<a href="/especie/{{ $especie->id }}/delete" class="btn btn-danger" onclick="return confirm('Confirma exclusão?');">
							<i class="fa fa-trash"></i>
							Excluir
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop