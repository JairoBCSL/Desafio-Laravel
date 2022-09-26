@extends('app.solicitacao.basico')

@section('titulo-final', ' - Criar')

@section('largura', 30)

@section('final')
  <p>ID da solicitação: {{$solicitacao->id}}</p>
  <form action="{{route('resposta.store')}}" method="post">
    @csrf
    <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id ?? ''}}">
    <textarea name="texto" value=""></textarea>
    <button type="submit" class="borda-preta">Responder</button>
  </form>
@endsection