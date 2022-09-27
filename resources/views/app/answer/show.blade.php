@extends('app.answer.basico')

@section('final')
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID da Solicitacao</th>
        <th>Texto</th>
        <th>Data de criação</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$answer->id}}</td>
        <td>{{$answer->solicitacao->id}}</td>
        <td>{{$answer->texto}}</td>
        <td>{{$answer->created_at}}</td>
        <td><a href="{{route('answer.edit', $answer)}}">Editar</a></td>
        <td>
          <form id="form_{{$answer->id}}" action="{{route('answer.destroy', ['answer' => $answer->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <a href="#" onclick="document.getElementById('form_{{$answer->id}}').submit()">Excluir</a>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
@endsection