
@extends('app.solicitacao.basico')

@section('final')
  <table border="1" width="80%;" style="margin-left: auto; margin-right: auto;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Motivo</th>
        <th>Status</th>
        <th>Protocolo</th>
        <th>Data de criação</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($solicitacoes as $solicitacao)
        <tr>
          <td>{{$solicitacao->id}}</td>
          <td>{{$solicitacao->titulo}}</td>
          <td>{{$solicitacao->descricao}}</td>
          <td>{{$solicitacao->motivo->motivo}}</td>
          <td>{{$solicitacao->status->nome}}</td>
          <td>{{$solicitacao->protocolo}}</td>
          <td>{{$solicitacao->created_at}}</td>
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
      @endforeach
    </tbody>
  </table>
@endsection