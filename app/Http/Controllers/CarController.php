<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        return view('cars');
    }

    public function getCar($id){
        return view('car', ['id' => $id]);
    }
}
