@extends('app.solicitacao.basico')

@section('titulo-final', ' - Criar')

@section('largura', 30)

@section('final')
  <form action="{{route('solicitacao.store')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$solicitacao->id ?? ''}}">
    <input type="hidden" name="status_id" value="{{$solicitacao->status_id ?? ''}}">
    <input type="text" name="titulo" value="{{$solicitacao->titulo ?? old('titulo')}}" placeholder="Titulo" class="borda-preta">
    {{$errors->has('titulo')?$errors->first('titulo'):''}}
    <select name="motivo_id">
      <option value="">--- Selecione um motivo ---</option>
      @foreach ($motivos as $motivo)
        <option value="{{$motivo->id}}">{{$motivo->motivo}}</option>    
      @endforeach
    </select>
    {{$errors->has('motivo_id')?$errors->first('motivo_id'):''}}
    <input type="text" name="descricao" value="{{$solicitacao->descricao ?? old('descricao')}}" placeholder="Desrição" class="borda-preta">
    {{$errors->has('descricao')?$errors->first('descricao'):''}}
    <button type="submit" class="borda-preta">Cadastrar</button>
  </form>
@endsection