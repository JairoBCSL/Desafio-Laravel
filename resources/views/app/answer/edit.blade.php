@extends('app.answer.basico')

@section('titulo-final', ' - Editar')

@section('largura', 30)

@section('final')
  <p>ID da solicitação: {{$answer->solicitacao->id}}</p>
  <p>{{$answer->solicitacao->descricao}}</p>
  <form action="{{route('answer.update', $answer)}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="solicitacao_id" value="{{$answer->solicitacao->id ?? ''}}">
    <textarea name="texto" value="">{{$answer->texto ?? ''}}</textarea>
    <button type="submit" class="borda-preta">Responder</button>
  </form>
@endsection