<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especie;

class EspecieController extends Controller
{
    
    public function index()
    {
		$especie = new Especie();
        $especies = Especie::All();
		return view("especie.index", [
			"especie" => $especie,
			"especies" => $especies
		]);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        if ($request->get("id") != 0) {
				$especie = Especie::Find($request->get("id"));
		}else{
			$especie = new Especie();
		}
		$especie->descricao = $request->get("descricao");
		$especie->save();
		$request->session()->flash("status", "Salvo com sucesso!");
		return redirect ("/especie");
    }

    
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especie =  Especie::Find("$id");
        $especies = Especie::All();
		return view("especie.index", [
			"especie" => $especie,
			"especies" => $especies
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Especie::Destroy($id);
		$request->session()->flash("status", "Deletado com sucesso!");
		return redirect("/especie");
    }
}
