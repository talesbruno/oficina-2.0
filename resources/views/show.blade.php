@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
      Cliente: {{$budget->client}}
    </div>
    <div class="card-body">
      <p class="card-text">Descrição: {{$budget->description}}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Vendedor: {{$budget->seller}}</li>
        <li class="list-group-item">Data: {{$budget->date}}</li>
        <li class="list-group-item">Valor: R$: {{$budget->value}}</li>
      </ul>
  </div>
</div>
@endsection
