@extends('layouts.main')

@section('title', 'Procurar Carros')


@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Buscar Veiculos por marca</h1>
        <form action="/cars" method="POST">
            @csrf
            <div class="form-group">
                <label for="search">Busca Veiculos: </label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Buscar veiculos..." />
            </div>
            <div class="form-group">
                <input type="submit" id="search" class="btn btn-primary" value="BUSCAR" />
            </div>
        </form>

    </div>

    @if (session('res'))
        <div class="alert alert-success" role="alert">
            Veiculos encontrados com sucesso
        </div>
        <a href="/cars">Acessar a lista de veiculos</a>
    @endif
@endsection
