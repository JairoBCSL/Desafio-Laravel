<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Solicitacao;

class AnswerController extends Controller
{

    public function __construct(Answer $answer){
        $this->answer = $answer;
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

        return view('app.answer.create', ['solicitacao' => $solicitacao]);
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
            $request->validate($this->answer->rules(), $this->answer->feedback());

            $solicitacao = Solicitacao::find($request->solicitacao_id);

            Answer::create($request->all());
        }

        return redirect()->route('solicitacao.show', ['solicitacao' => $solicitacao]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show($id, Solicitacao $solicitacao)
    {
        $answer = Answer::find($id);
        
        if($answer == null){
            return redirect()->route('answer.index');
        }

        return view('app.answer.show', ['answer' => $answer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::find($id);

        return view('app.answer.edit', ['answer' => $answer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        if($request->input('_token') != ''){
            $request->validate($this->answer->rules(), $this->answer->feedback());

            $solicitacao = Solicitacao::find($request->solicitacao_id);

            $answer->update($request->all());
        }

        return redirect()->route('solicitacao.show', ['solicitacao' => $solicitacao]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $answer = Answer::find($id);

        if(isset($answer)){
            $answer->delete();
        }
        
        return redirect()->route('solicitacao.index');
    }
}
