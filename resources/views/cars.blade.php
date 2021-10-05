@extends('layouts.main')

@section('title', 'Car')


@section('content')
    @if (session('msg'))
        <div class="alert alert-danger" role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <h1>Lista dos Veiculos</h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ano</th>
                <th scope="col">Quilometragem</th>
                <th scope="col">Cor</th>
                <th scope="col">Visualizar</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cars as $car)
                <tr>
                    <th scope="row">{{ $car->id }}</th>
                    <td>{{ $car->nome_veiculo }}</td>
                    <td>{{ $car->ano }}</td>
                    <td>{{ $car->quilometragem }}</td>
                    <td>{{ $car->cor }}</td>
                    <td>
                        <a href="/cars/{{ $car->id }}">
                            Acessar
                        </a>
                    </td>
                    <td>
                        <form action="/cars/{{ $car->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Danger</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection
