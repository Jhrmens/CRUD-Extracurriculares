<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extracurricular;
use App\Cadastro;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $extracurriculares = Extracurricular::all();
        $cadastros = Cadastro::all();

        return view('extracurricular.index', compact('extracurriculares', 'cadastros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('extracurricular.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'aula'=>'required',
            'vagas'=>'required'

        ]);

        $extracurricular = new Extracurricular([
            'aula' => $request->get('aula'),
            'vagas' => $request->get('vagas')
        ]);

        $extracurricular->save();
        return redirect('extracurricular/create')->with('success', 'Cadastro feito com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $extracurriculares = Extracurricular::findOrFail($id);

        $cadastrados = Cadastro::where('extracurricular_id', '=', $id)
        ->orWhere('extracurricular_id2', '=', $id)
        ->orWhere('extracurricular_id3', '=', $id)
        ->orWhere('extracurricular_id4', '=', $id)
        ->orWhere('extracurricular_id5', '=', $id)
        ->take($extracurriculares->vagas)
        ->orderBy('created_at', 'DESC')
        ->get();
        
        $cadastros = Cadastro::all();
        return view('extracurricular.show', compact('extracurriculares', 'cadastros', 'cadastrados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $extracurricular = Extracurricular::findOrFail($id);
        return view('extracurricular.edit', compact('extracurricular'));
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
        $request->validate([
           'aula'=>'required', 
           'vagas'=>'required'
        ]);

        $extracurricular = Extracurricular::find($id);

        $extracurricular->aula = $request->get('aula');
        $extracurricular->vagas = $request->get('vagas');

        $extracurricular->save();
        return back()->with('success', 'Extracurricular atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
