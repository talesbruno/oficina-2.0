
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach 
@endif

<form action="{{route('budgets.store')}}" method="post">
    @csrf
    <input type="text" placeholder="Nome do cliente" name="client" value="{{old('client')}}">
    <input type="text" placeholder="Nome do vendedor" name="seller" value="{{old('seller')}}">
    <input type="number" placeholder="Valor do orçamento" name="value" value="{{old('value')}}">
    <input type="datetime-local" name="date" value="{{old('date')}}">
    <textarea cols="30" rows="5" placeholder="Descrição" name="description">{{old('description')}}</textarea>
    <button type="submit">Cadastrar</button>
</form>