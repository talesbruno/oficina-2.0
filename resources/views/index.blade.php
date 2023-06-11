@extends('layouts.app')
 
@section('header')
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        Listagem de agendamentos
    </a>
  </nav>
@endsection

@section('content')
<div class="container">
    @if ($startDate && $endDate)
<h2>Orçamentos filtrados por intervalo de datas: {{ $startDate }} a {{ $endDate }}</h2>
@elseif ($filter)
<h2>Orçamentos filtrados por: {{ $filter }}</h2>
@else
<h2>Todos os Orçamentos</h2>
@endif
</div>
<div class="container">

    <div class="mb-3">
        <a class="icon-link " href="{{route('budgets.create')}}">Adicionar um novo orçamento</i></a>
    </div>


<form method="GET" action="{{ route('budgets.index') }}">
    <div class="form-group">
        <div class="mb-3">
            <h6>Filtrar por: </h6>
        </div>
        <div class="mb-3">
    <label for="startDate">Data inicial (YYYY-MM-DD)</label>
    <input class="form-control" type="datetime-local" name="startDate">
</div>
<div class="mb-3">
    <label for="endDate">Data final (YYYY-MM-DD)</label>
    <input class="form-control" type="datetime-local" name="endDate">
</div>
<div class="mb-3">
    <label for="">Ou</label>
    <input class="form-control" type="text" name="filter" placeholder="Filtro por cliente ou vendedor">
</div>
    <button class="btn btn-primary" type="submit">Filtrar</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <th scope="col">Cliente</th>
        <th scope="col">descrição</th>
        <th scope="col">Valor</th>
        <th scope="col">Data</th>
        <th scope="col">Vendedor</th>
    </thead>
    <tbody>
        @foreach ($budgets as $budget)
            <tr>
                <td>{{$budget->client}}</td>
                <td>{{$budget->description}}</td>
                <td>{{$budget->value}}</td>
                <td>{{$budget->date}}</td>
                <td>{{$budget->seller}}</td>
                <td>
                    <a href="{{route('budgets.show', $budget->id)}}">ver mais</a>
                    <a href="{{route('budgets.edit', $budget->id)}}">editar</a>
                    <form action="{{route('budgets.destroy', $budget->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><i class="fa-solid fa-trash-can"></i>deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
