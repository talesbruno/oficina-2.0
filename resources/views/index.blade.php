@extends('layouts.app')
 
@section('header')
    <h1>Listagem de agendamentos</h1>
@endsection

@section('content')

@if ($startDate && $endDate)
    <h2>Orçamentos filtrados por intervalo de datas: {{ $startDate }} a {{ $endDate }}</h2>
@elseif ($filter)
    <h2>Orçamentos filtrados por: {{ $filter }}</h2>
@else
    <h2>Todos os Orçamentos</h2>
@endif

<a href="{{route('budgets.create')}}">add um novo</a>
<form method="GET" action="{{ route('budgets.index') }}">
    <label for="">Data inicial (YYYY-MM-DD)</label>
    <input type="datetime-local" name="startDate">
    <label for="">Data final (YYYY-MM-DD)</label>
    <input type="datetime-local" name="endDate">
    <input type="text" name="filter" placeholder="Filtro por cliente ou vendedor">
    <button type="submit">Filtrar</button>
</form>
<table>
    <thead>
        <th>Cliente</th>
        <th>descrição</th>
        <th>Valor</th>
        <th>Data</th>
        <th>Vendedor</th>
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
@endsection
