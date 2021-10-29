<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScrapingController extends Controller
{

    private $data  = array();

    public function scraper()
    {
        $client = new Client();
        $url = 'https://climatologia.meteochile.gob.cl/application/diario/boletinClimatologicoDiario/actual';
        $page = $client->request('GET', $url);

        $texto_fecha = "";
        $page->filter('h5[class="text-right text-requerimiento"]')->each(function ($node) {
            $texto_fecha = $node->text();
            $this->fecha_actual = substr($texto_fecha, 20, -6);
        });
        $client2 = new Client();
        $page2 = $client2->request('GET', $url);
        $page2->filter('table[class="table table-bordered"]')->each(function ($node) {
            $tr = $node->filter('td');
            $aux = 0;
            for($i = 0 ; $i < 22; $i++) {
                $this->data[$i]['nombre_estacion'] = $tr->eq(14 + $aux)->text();
                $this->data[$i]['temperatura_minima'] = (float)$tr->eq(15 + $aux)->text();
                $this->data[$i]['temperatura_maxima'] = (float)$tr->eq(17 + $aux)->text();
                $this->data[$i]['precipitaciones'] = (float)$tr->eq(20 + $aux)->text();
                $this->data[$i]['fecha'] = $this->fecha_actual;
                $aux += 11;
            }
        });

        //Store the scraped data into database
        DataClimaController::store($this->data);
        
        /*return response()
                ->json($this->data);*/
    }
}
