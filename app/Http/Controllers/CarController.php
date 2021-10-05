<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use GuzzleHttp\Client;

class CarController extends Controller
{
    public function index()
    {

        $cars = Car::all();

        return view('cars', ['cars' => $cars]);
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('car', ['car' => $car]);
    }

    public function search()
    {
        return view('car_search');
    }

    public function store(Request $request)
    {
        $termo = $request->search;

        $client = new Client();

        $res = $client->request('GET', "https://www.questmultimarcas.com.br/estoque?termo=$termo");

        $html = $res->getBody()->getContents();

        $regExLink = '/class="card__img">(\n|\r)\s+<a href="(https:\/\/www.questmultimarcas.com.br\/carros\/[a-z 0-9 \-]+\/[a-z0-9 \/\-]+)/';
        $regExNomeVeiculo = '/<a href="https:\/\/www.questmultimarcas.com.br\/carros\/[a-z 0-9 \-]+\/[a-z0-9 \/\-]+">([a-z A-Z 0-9 .\- \/]+)/';
        $regExAno = '/Ano:\s<\/span>(\n|\r)\s+<span class="card-list__info">((\n|\r)\s+)([a-z A-Z á Á 0-9.]+)/';
        $regExCombustivel = '/Combustível:\s<\/span>(\n|\r)\s+<span class="card-list__info">((\n|\r)\s+)([a-z A-Z]+)/';
        $regExCambio = '/Câmbio:\s<\/span>(\n|\r)\s+<span class="card-list__info">((\n|\r)\s+)([a-z A-Z á Á]+)/';
        $regExPortas = '/Portas:\s<\/span>(\n|\r)\s+<span class="card-list__info">((\n|\r)\s+)([a-z A-Z 0-9 á Á]+)/';
        $regExQuilometragem = '/Quilometragem:\s<\/span>(\n|\r)\s+<span class="card-list__info">((\n|\r)\s+)([0-9.]+)/';
        $regExCor = '/Cor:\s<\/span>(\n|\r)\s+<span class="card-list__info">((\n|\r)\s+)([a-z A-Z á Á]+)/';

        preg_match_all($regExLink, $html, $arrLink);
        preg_match_all($regExNomeVeiculo, $html, $arrNomeVeiculos);
        preg_match_all($regExAno, $html, $arrAno);
        preg_match_all($regExCombustivel, $html, $arrCombustivel);
        preg_match_all($regExCambio, $html, $arrCambio);
        preg_match_all($regExPortas, $html, $arrPortas);
        preg_match_all($regExQuilometragem, $html, $arrQuilometragem);
        preg_match_all($regExCor, $html, $arrCor);

        $listCars = array();

        for ($i = 0; $i < count($arrNomeVeiculos[1]); $i++) {

            $car = new Car;
            $car->user_id = auth()->user()->id;
            $car->nome_veiculo = $arrNomeVeiculos[1][$i];
            $car->link = $arrLink[2][$i];
            $car->ano = $arrAno[4][$i];
            $car->combustivel = $arrCombustivel[4][$i];
            $car->portas = explode(" ", $arrPortas[4][$i])[0];
            $car->quilometragem = str_replace(".", "", $arrQuilometragem[4][$i]);
            $car->cambio = $arrCambio[4][$i];
            $car->cor = $arrCor[4][$i];

            array_push($listCars, $car);

            $car->save();
        }

        $status = 0;
        if (count($listCars) > 0) {
            $status = 1;
        }

        return redirect("/cars/search")->with('res', $status);
    }
}
