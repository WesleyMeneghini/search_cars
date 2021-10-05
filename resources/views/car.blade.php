@extends('layouts.main')

@section('title', 'Car')


@section('content')
        <p>Exibindo carro id: {{ $car->id }}</p>
        <p>nome Carro: {{ $car->nome_veiculo }}</p>

@endsection
