@extends('layouts.app')
 
@section('header')
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">Oficina-2.0</a>
      <form class="d-flex" role="search">
        <a class="icon-link " href="{{route('budgets.create')}}">Adicionar um novo orçamento<i class="bi bi-plus-circle-fill"></i></a>
      </form>
    </div>
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
    <form class="form-inline" method="GET" action="{{ route('budgets.index') }}">
        <div class="row">
        <div class="col">
            <label for="startDate">Data inicial (YYYY-MM-DD)</label>
            <input class="form-control" type="datetime-local" name="startDate">
        </div>
        <div class="col">
            <label for="endDate">Data final (YYYY-MM-DD)</label>
            <input class="form-control" type="datetime-local" name="endDate">
        </div>
        <div class="col">
            <label for="filter">Ou</label>
            <input class="form-control" type="text" name="filter" placeholder="Filtro por cliente ou vendedor">
        </div>
        <div class="col">
        <button class="btn btn-primary" type="submit">Filtrar</button>
    </div>
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
                    <a href="{{route('budgets.show', $budget->id)}}"><i class="bi bi-eye-fill"></i></a>
                    <a href="{{route('budgets.edit', $budget->id)}}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{route('budgets.destroy', $budget->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
