@extends('layouts.main')

@section('title', 'Car')


@section('content')

    @foreach ($cars as $car)
        <p>#: {{ $car->id }} </p>

        <a href="{{$car->link}}" target="_blank" rel="noopener noreferrer">acessar</a>
        <a href="/cars/{{$car->id}}">Pesquisar apenas esse veiculo</a>
        <p>{{ $car->nome_veiculo }}</p>
    @endforeach

@endsection
