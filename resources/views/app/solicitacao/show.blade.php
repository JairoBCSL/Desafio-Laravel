
@extends('app.solicitacao.basico')

@section('final')
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Motivo</th>
        <th>Status</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$solicitacao->id}}</td>
        <td>{{$solicitacao->titulo}}</td>
        <td>{{$solicitacao->descricao}}</td>
        <td>{{$solicitacao->motivo->motivo}}</td>
        <td>{{$solicitacao->status->nome}}</td>
        <td><a href="{{route('solicitacao.add', $solicitacao->id)}}">Responder</a></td>
        <td><a href="{{route('solicitacao.edit', $solicitacao)}}">Editar</a></td>
        <td>
          <form id="form_{{$solicitacao->id}}" action="{{route('solicitacao.destroy', ['solicitacao' => $solicitacao->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <a href="#" onclick="document.getElementById('form_{{$solicitacao->id}}').submit()">Excluir</a>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
  <h3>Answers</h3>
  <table border="1" style="margin-left: auto; margin-right: auto; ">
    <thead>
      <tr>
        <th>ID da Resposta</th>
        <th>Texto</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($solicitacao->answers as $answer)
        <tr>
          <td>{{$answer->id}}</td>
          <td>{{$answer->texto}}</td>
          <td><a href="{{route('answer.show', $answer)}}">Detalhes</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection