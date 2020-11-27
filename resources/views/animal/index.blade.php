@extends("layout.master")

@section("titulo", "Animal")

@section("cadastro")
	
	<h1>Animal</h1>

	<form method="POST" action="/animal">
		@csrf
		<input type="hidden" name="id" value="{{ $animal->id }}" />
		<div class="row">
			<div class="col-6 form-group">
				<label for="nome">Nome:</label>
				<input type="text" name="nome" value="{{ $animal->nome }}" class="form-control" />
			</div>
			<div class="col-6 form-group">
				<label for="dono">Dono:</label>
				<input type="text" name="dono" value="{{ $animal->dono }}" class="form-control" />
			</div>
			<div class="col-3 form-group">
				<label for="especie">Espécie:</label>
				<select name="especie" class="form-control">
					<option value=""></option>
					@foreach ($especies as $especie)
					
						@if ($especie->id == $animal->especie)
							<option value="{{ $especie->id }}" selected="selected">{{ $especie->descricao }}</option>
						@else
							<option value="{{ $especie->id }}">{{ $especie->descricao }}</option>
						@endif
						
					@endforeach
				</select>
			</div>
			<div class="col-3 form-group">
				<label for="raca">Raça:</label>
				<input type="text" name="raca" value="{{ $animal->raca }}" class="form-control" />
			</div>
			<div class="col-3 form-group">
				<label for="nascimento">Dt. Nascimento:</label>
				<input type="date" name="nascimento" value="{{ $animal->nascimento }}" class="form-control" />
			</div>
			<div class="col-3">
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
			<col width="400">
			<col width="400">
			<col width="400">
			<col width="200">
			<col width="200">
			<col width="200">
		</colgroup>	
		<thead>
			<tr>
				<th>Nome</th>
				<th>Dono</th>
				<th>Espécie</th>
				<th>Idade</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($animais as $animal)
				<tr>
					<td>{{ $animal->nome }}</td>
					<td>{{ $animal->dono }}</td>
					<td>{{ $animal->especie }}</td>
					<td>{{ $animal->idade }}</td>
					<td>
						<a href="/animal/{{ $animal->id }}/edit" class="btn btn-warning">
							<i class="fa fa-edit"></i>
							Editar
						</a>
					</td>
					<td>
						<a href="/animal/{{ $animal->id }}/delete" class="btn btn-danger" onclick="return confirm('Confirma exclusão?');">
							<i class="fa fa-trash"></i>
							Excluir
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop