@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach 
@endif
<form action="{{route('budgets.update', $budget->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputClient">Nome do cliente</label>
        <input type="text" class="form-control" placeholder="Nome do cliente" name="client" value="{{$budget->client}}">
      </div>
      <div class="form-group col-md-6">
        <label for="inputSeller">Nome do vendendor</label>
        <input type="text" class="form-control" placeholder="Nome do vendedor" name="seller" value="{{$budget->seller}}">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputValue">Valor do orçamento</label>
      <input type="number" class="form-control" placeholder="Valor do orçamento" name="value" value="{{$budget->value}}">
    </div>
    <div class="form-group col-md-6">
      <label for="inputDate">Data</label>
      <input type="datetime-local" class="form-control" name="date" value="{{$budget->date}}">
    </div>
    <div class="form-group col-md-6">
        <label for="inputDescription">Descrição</label>
        <textarea cols="30"  class="form-control" rows="5" placeholder="Descrição" name="description">{{$budget->description}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>
@endsection