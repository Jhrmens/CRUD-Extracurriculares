<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use PDF;

use App\Cooperados;
use App\Extracurricular;
use App\Cadastro;
class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $search = Input::get('search');
        $cadastro = Cadastro::where('dependente', 'like', '%'. $search . '%')->take(10)->get();

        return view('cadastro.index', compact('cadastro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $cpf = $request->input('cpf');
        
        $cooperado = \DB::table('cooperados')   // query builder, busca o registro de acordo com cpf
            ->select('id', 'nome', 'cpf')
            ->where('cpf', '=', $cpf)
            ->first();

        //$cooperado = Cooperados::find($id);
        //return view('cadastro.create', compact('cooperado'));

        $extracurricular = Extracurricular::orderBy('vagas')->get();

        if(count($cooperado) == 0){

            return redirect('validar')->with('success', 'CPF incorreto ou não registrado');
            //return view('cadastro.create', compact('cooperado'));

        } else {

            //return redirect('validar')->with('success', 'CPF incorreto ou não registrado');
            return view('cadastro.create', compact('cooperado', 'extracurricular'));

        }

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
        if($request['extracurricular_id2'] === "0"){
            $request['extracurricular_id2'] = null;
        }

        if($request['extracurricular_id3'] === "0"){
            $request['extracurricular_id3'] = null;
        }

        if($request['extracurricular_id4'] === "0"){
            $request['extracurricular_id4'] = null;
        }

        if($request['extracurricular_id5'] === "0"){
            $request['extracurricular_id5'] = null;
        }

        $request->validate([
            'cooperado_id'=>'required',
            'extracurricular_id'=>'required',
            'extracurricular_id2'=>'nullable',
            'extracurricular_id3'=>'nullable',
            'extracurricular_id4'=>'nullable',
            'extracurricular_id5'=>'nullable',
            'dependente'=>'required',
            'serie'=>'required',
            'integral'=>'required'
        ]);

        $cadastro = new Cadastro([
            'cooperado_id' => $request->get('cooperado_id'),
            'extracurricular_id' => $request->get('extracurricular_id'),
            'extracurricular_id2' => $request->get('extracurricular_id2'),
            'extracurricular_id3' => $request->get('extracurricular_id3'),
            'extracurricular_id4' => $request->get('extracurricular_id4'),
            'extracurricular_id5' => $request->get('extracurricular_id5'),
            'dependente' => $request->get('dependente'),
            'serie' => $request->get('serie'),
            'integral'=> $request->get('integral')
        ]);

        $cadastro->save();

        //$extracurricular = Extracurricular::all();

        //$cooperado = Cooperados::find($cadastro->cooperado_id);

        //$cadastro = Cadastro::findOrFail($cadastro->id);

        //$pdf = PDF::loadview('cadastro.show', compact('cadastro', 'extracurricular', 'cooperado'));

        //return redirect ('/validar')->with('done', 'Inscrição feita com sucesso clique aqui para baixar a requisição ou entre em contato com mantenedora');

        return Redirect::to('/validar')->with(['id'=>$cadastro->id, 'done'=>'Inscrição feita com sucesso, agora é so baixar a requisição e levar a mantenedora assinada ou ir diretamente a mantenedora']);
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
        $cadastro = Cadastro::findOrFail($id);
        $extracurricular = Extracurricular::all();

        $cooperado = Cooperados::find($cadastro->cooperado_id);

        $pdf = PDF::loadview('cadastro.show', compact('cadastro', 'extracurricular', 'cooperado'));

        return $pdf->download($cadastro->dependente .'.pdf');
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
        $cadastro = Cadastro::findOrFail($id);
        $extracurricular = Extracurricular::all();
        $cooperado = Cooperados::find($cadastro->cooperado_id);
        return view('cadastro.edit', compact('cadastro', 'cooperado', 'extracurricular'));
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
        if($request['extracurricular_id2'] === "0"){
            $request['extracurricular_id2'] = null;
        }

        if($request['extracurricular_id3'] === "0"){
            $request['extracurricular_id3'] = null;
        }

        if($request['extracurricular_id4'] === "0"){
            $request['extracurricular_id4'] = null;
        }

        if($request['extracurricular_id5'] === "0"){
            $request['extracurricular_id5'] = null;
        }

        $request->validate([
            'cooperado_id'=>'required',
            'extracurricular_id'=>'required',
            'extracurricular_id2'=>'nullable',
            'extracurricular_id3'=>'nullable',
            'extracurricular_id4'=>'nullable',
            'extracurricular_id5'=>'nullable',
            'dependente'=>'required',
            'serie'=>'required',
            'integral'=>'required'
        ]);

        $cadastro = Cadastro::find($id);
        $cadastro->cooperado_id = $request->get('cooperado_id');
        $cadastro->extracurricular_id = $request->get('extracurricular_id');
        $cadastro->extracurricular_id2 = $request->get('extracurricular_id2');
        $cadastro->extracurricular_id3 = $request->get('extracurricular_id3');
        $cadastro->extracurricular_id4 = $request->get('extracurricular_id4');
        $cadastro->extracurricular_id5 = $request->get('extracurricular_id5');
        $cadastro->dependente = $request->get('dependente');
        $cadastro->serie = $request->get('serie');
        $cadastro->integral = $request->get('integral');
        $cadastro->save();

        return back()->with('success', 'O aluno atualizado');
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
        $cadastro = Cadastro::find($id);
        $cadastro->delete();

    return back()->with('success', 'O aluno foi removido com sucesso');
    }
}
