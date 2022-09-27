<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\Motivo;
use App\Models\Status;
use App\Models\Answer;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{

    public function __construct(Solicitacao $solicitacao){
        $this->solicitacao = $solicitacao;
    }

    public function index()
    {
        $statuses = Status::all();
        $motivos = Motivo::all();

        return view('app.solicitacao.index', ['statuses' => $statuses, 'motivos' => $motivos]);
    }

    public function list(Request $request){
        $solicitacoes = Solicitacao//::where('id', '>', 1)->get();
            ::where('titulo', 'like', '%'.$request->input('titulo').'%')
            ->where('motivo_id', 'like', '%'.$request->input('motivo_id').'%')
            ->where('descricao', 'like', '%'.$request->input('descricao').'%')
            ->where('status_id', 'like', '%'.$request->input('status_id').'%')
            ->where('protocolo', 'like', '%'.$request->input('protocolo').'%')
            ->whereDate('created_at', 'like', '%'.$request->input('created_at').'%')
            ->paginate(10);
        return view('app.solicitacao.list', ['solicitacoes' => $solicitacoes, 'request' => $request->all()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motivos = Motivo::all();
        
        return view('app.solicitacao.create', ['motivos' => $motivos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->solicitacao->rules(), $this->solicitacao->feedback());
        //print_r($request->all());
        Solicitacao::create([
            'titulo' => $request->titulo??'',
            'motivo_id' => $request->motivo_id??'',
            'descricao' => $request->descricao??'',
            'status_id' => 1,
            'protocolo' => time()
        ]);
        return redirect()->route('solicitacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitacao = Solicitacao::find($id);
        
        if($solicitacao == null){
            return redirect()->route('solicitacao.index');
        }

        return view('app.solicitacao.show', ['solicitacao' => $solicitacao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motivos = Motivo::all();
        $statuses = Status::all();
        $solicitacao = Solicitacao::find($id);
        
        return view('app.solicitacao.edit', ['statuses' => $statuses, 'motivos' => $motivos, 'solicitacao' => $solicitacao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitacao $solicitacao)
    {
        $request->validate($this->solicitacao->rules(), $this->solicitacao->feedback());
        //print_r($request->all());

        if($request->input('_token') != '' && $request->input('id') != ''){
            $solicitacao = Solicitacao::find($request->input('id'));
            $update = $solicitacao->update($request->all());
            $msg = $update?'Update feito com sucesso!':'Erro ao atualizar o registro.';
        }

        return redirect()->route('solicitacao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitacao $solicitacao)
    {
        if(isset($solicitacao)){
            $answers = Answer::all()->where('solicitacao_id', $solicitacao->id);
            $delete = true;
            foreach ($answers as $answer) {
                $delete = $answer->delete() && $delete;
            }
            $solicitacao->delete();   
            $delete = $solicitacao->delete() && $delete;         
        }

        return redirect()->route('solicitacao.index');
    }

    public function add($id){
        $solicitacao = Solicitacao::find($id);

        return redirect()->route('answer.create', ['id' => $id]);
    }
}
