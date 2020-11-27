<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especie;
use App\Animal;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
	
	public function listaAnimais() {
		$animais = DB::table('animal AS a')
						->join('especie AS e', 'a.especie', '=', 'e.id')
						->select('a.id', 'a.nome', 'a.dono', 'a.idade', 'e.descricao AS especie')
						->get();
		return $animais;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal = new Animal();
		$animais = $this->listaAnimais();
        $especies = Especie::All();
		return view("animal.index", [
			"animal" => $animal,
			"animais" => $animais,
			"especies" => $especies
		]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get("id") != 0) {
			$animal = Animal::Find($request->get("id"));
		} else {
			$animal = new Animal();
		}
		$animal->nome = $request->get("nome");
		$animal->dono = $request->get("dono");
		$animal->especie = $request->get("especie");
		$animal->raca = $request->get("raca");
		$animal->nascimento = $request->get("nascimento");
		
		$atual = new \DateTime();
		$nascimento = new \DateTime($request->get("nascimento"));
		$diff = date_diff($atual, $nascimento);
		$idade = $diff->format("%y");
		$animal->idade = $idade;
		
		$animal->save();
		$request->session()->flash("status", "Salvo com sucesso!");
		return redirect("/animal");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::Find($id);
		$animais = $this->listaAnimais();
        $especies = Especie::All();
		return view("animal.index", [
			"animal" => $animal,
			"animais" => $animais,
			"especies" => $especies
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Animal::Destroy($id);
		$request->session()->flash("status", "Deletado com sucesso!");
		return redirect("/animal");
    }
}
