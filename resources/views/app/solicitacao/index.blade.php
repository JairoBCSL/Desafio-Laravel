@extends('app.solicitacao.basico')

@section('final')
<div style="width: 30%; margin-left: auto; margin-right: auto">
  <form action="{{route('solicitacao.list')}}" method="post">
    @csrf
    <input type="text" name="titulo" placeholder="Título" class="borda-preta">
    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta">
    <select name="motivo_id">
      <option value="">--- Selecione um motivo ---</option>
      @foreach ($motivos as $motivo)
          <option value="{{$motivo->id}}">{{$motivo->motivo}}</option>
      @endforeach
    </select>
    <select name="status_id">
      <option value="">--- Selecione um status ---</option>
      @foreach ($statuses as $status)
          <option value="{{$status->id}}">{{$status->nome}}</option>
      @endforeach
    </select>
    <input type="text" name="protocolo" placeholder="Protocolo" class="borda-preta">
    <input type="date" name="created_at" placeholder="27/09/2022" class="borda-preta">
    <button type="submit" class="borda-preta">Pesquisar</button>
  </form>
</div>
@endsection