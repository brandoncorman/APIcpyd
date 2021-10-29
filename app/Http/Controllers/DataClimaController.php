<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataClima;

class DataClimaController extends Controller
{
    public static function store(array $request) {
        foreach($request as $data) {
            DataClima::updateOrCreate($data);
        }
    }
}
