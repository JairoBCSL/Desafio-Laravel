<?php

namespace App\Http\Controllers;

use App\Models\Resposta;
use Illuminate\Http\Request;
use App\Models\Solicitacao;

class RespostaController extends Controller
{

    public function __construct(Resposta $resposta){
        $this->resposta = $resposta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $solicitacao = Solicitacao::find($request->id);

        return view('app.resposta.create', ['solicitacao' => $solicitacao]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('_token') != ''){
            $request->validate($this->resposta->rules(), $this->resposta->feedback());

            $solicitacao = Solicitacao::find($request->solicitacao_id);

            Resposta::create($request->all());
        }

        return redirect()->route('solicitacao.show', ['solicitacao' => $solicitacao]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function show(Resposta $resposta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Resposta $resposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resposta $resposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resposta $resposta)
    {
        //
    }
}
