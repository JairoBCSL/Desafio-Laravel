<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\Motivo;
use App\Models\Status;
use App\Models\Resposta;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{

    public function __construct(Solicitacao $solicitacao){
        $this->solicitacao = $solicitacao;
    }

    public function index()
    {
        return view('app.solicitacao.index');
    }

    public function listar(Request $request){
        $solicitacoes = Solicitacao
            //::where('titulo', 'like', '%'.$request->input('titulo').'%');
            // ->where('motivo_id', 'like', '%'.$request->input('motivo_id').'%')
            // ->where('descricao', 'like', '%'.$request->input('descricao').'%')
            // ->where('status_id', 'like', '%'.$request->input('status_id').'%')
            // ->where('protocolo', 'like', '%'.$request->input('protocolo').'%');
            // ->paginate(10);  
            ::all();
        //print_r($request->all());
        //print_r($request->input);
        return view('app.solicitacao.listar', ['solicitacoes' => $solicitacoes, 'request' => $request->all()]);
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


        if(isset($pedido)){
            $pedidos_produtos = PedidoProduto::all()->where('pedido_id', $pedido->id);
            $delete = true;
            foreach ($pedidos_produtos as $pedido_produto) {
                $delete = $pedido_produto->delete() && $delete;
            }
            $delete = $pedido->delete() && $delete;
            if($delete){
                $msg = 'Registro deletado com sucesso';
            }else{
                $msg = 'Erro ao deletar registro';
            }            
        }else{
            $msg = 'O registro que você quer deletar não existe';
        } 


        if(isset($solicitacao)){
            $respostas = Resposta::all()->where('solicitacao_id', $solicitacao->id);
            $delete = true;
            foreach ($respostas as $resposta) {
                $delete = $resposta->delete() && $delete;
            }
            $solicitacao->delete();   
            $delete = $solicitacao->delete() && $delete;         
        }

        return redirect()->route('solicitacao.index');
    }

    public function add($id){
        $solicitacao = Solicitacao::find($id);

        return redirect()->route('resposta.create', ['id' => $id]);
    }
}
