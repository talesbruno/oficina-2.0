@extends('layouts.app')
 
@section('header')
    <h1>Listagem de agendamentos</h1>
@endsection

@section('content')
<a href="{{route('budgets.create')}}">add um novo</a>
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
