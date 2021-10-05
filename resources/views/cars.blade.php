@extends('layouts.main')

@section('title', 'Car')


@section('content')
    @if (session('msg'))
        <div class="alert alert-danger" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    @foreach ($cars as $car)
        <p>#: {{ $car->id }} </p>

        <a href="{{ $car->link }}" target="_blank" rel="noopener noreferrer">acessar</a>
        <a href="/cars/{{ $car->id }}">Pesquisar apenas esse veiculo</a>
        <p>{{ $car->nome_veiculo }}</p>
        <form action="/cars/{{ $car->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Danger</button>
        </form>
    @endforeach

@endsection
