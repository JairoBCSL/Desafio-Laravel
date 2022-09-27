@extends('app.solicitacao.basico')

@section('titulo-final', ' - Criar')

@section('largura', 30)

@section('final')
  <form action="{{route('solicitacao.update', ['solicitacao' => $solicitacao->id])}}" method="post">
    @csrf    
    @method('PUT')
    <input type="hidden" name="id" value="{{$solicitacao->id ?? ''}}">
    <input type="hidden" name="status_id" value="{{$solicitacao->status_id ?? ''}}">
    <input type="text" name="titulo" value="{{$solicitacao->titulo ?? old('titulo')}}" placeholder="Titulo" class="borda-preta">
    {{$errors->has('titulo')?$errors->first('titulo'):''}}
    <select name="motivo_id">
      <option value="">--- Selecione um motivo ---</option>
      @foreach ($motivos as $motivo)
        <option value="{{$motivo->id}}">{{$motivo->motivo}} - {{$motivo->id}}</option>    
      @endforeach
    </select>
    {{$errors->has('motivo_id')?$errors->first('motivo_id'):''}}
    <input type="text" name="descricao" value="{{$solicitacao->descricao ?? old('descricao')}}" placeholder="Desrição" class="borda-preta">
    {{$errors->has('descricao')?$errors->first('descricao'):''}}
    <select name="status_id">
      <option value="">--- Selecione um status ---</option>
      @foreach ($statuses as $status)
        <option value="{{$status->id}}">{{$status->nome}}</option>    
      @endforeach
    </select>
    {{$errors->has('status_id')?$errors->first('status_id'):''}}
    <button type="submit" class="borda-preta">Editar</button>
  </form>
@endsection