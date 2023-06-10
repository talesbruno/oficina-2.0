<h1>edit</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach 
@endif

<form action="{{route('budgets.update', $budget->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" placeholder="Nome do cliente" name="client" value="{{$budget->client}}">
    <input type="text" placeholder="Nome do vendedor" name="seller" value="{{$budget->seller}}">
    <input type="number" placeholder="Valor do orçamento" name="value" value="{{$budget->value}}">
    <input type="datetime" name="date" value="{{$budget->date}}">
    <textarea cols="30" rows="5" placeholder="Descrição" name="description">{{$budget->description}}</textarea>
    <button type="submit">Cadastrar</button>
</form>