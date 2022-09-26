@extends('app.solicitacao.basico')

@section('final')
  <form action="{{route('solicitacao.listar')}}" method="post">
    @csrf
    <input type="text" name="titulo" placeholder="Título" class="borda-preta">
    <input type="text" name="motivo" placeholder="Motivo" class="borda-preta">
    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta">
    <input type="text" name="status" placeholder="Status" class="borda-preta">
    <input type="text" name="protocolo" placeholder="Protocolo" class="borda-preta">
    <button type="submit" class="borda-preta">Pesquisar</button>
  </form>
@endsection