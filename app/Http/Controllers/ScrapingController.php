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
                $this->data[$i]['temperatura_minima'] = (float)$tr->eq(15 + $aux)->text() + 273.15;
                $this->data[$i]['temperatura_maxima'] = (float)$tr->eq(17 + $aux)->text() + 273.15;
                $this->data[$i]['precipitaciones'] = ((float)$tr->eq(20 + $aux)->text())/1000;
                $this->data[$i]['fecha'] = $this->fecha_actual;
                switch ($this->data[$i]['nombre_estacion']) {
                    case 'Chacalluta, Arica Ap.':
                        $this->data[$i]['codigo_estacion'] = 180005;
                        $this->data[$i]['latitud'] = "18° 21' 20'' S";
                        $this->data[$i]['longitud'] = '70.2°W';
                        $this->data[$i]['altitud'] = "50";
                        break;
                    case 'Diego Aracena Iquique Ap.':
                        $this->data[$i]['codigo_estacion'] = 200006;
                        $this->data[$i]['latitud'] = "20° 32' 57'' S";
                        $this->data[$i]['longitud'] = '70.11ºW';
                        $this->data[$i]['altitud'] = "48";
                        break;
                    case 'El Loa, Calama Ad.':
                        $this->data[$i]['codigo_estacion'] = 220002;
                        $this->data[$i]['latitud'] = "22° 29' 53'' S";
                        $this->data[$i]['longitud'] = '68.89ºW';
                        $this->data[$i]['altitud'] = "2321";
                        break;
                    case 'Cerro Moreno Antofagasta Ap.':
                        $this->data[$i]['codigo_estacion'] = 230001;
                        $this->data[$i]['latitud'] = "23° 27' 13'' S";
                        $this->data[$i]['longitud'] = '70.26ºW';
                        $this->data[$i]['altitud'] = "112";
                        break;
                    case 'Mataveri  Isla de Pascua Ap.':
                        $this->data[$i]['codigo_estacion'] = 270001;
                        $this->data[$i]['latitud'] = "27° 9' 32'' S";
                        $this->data[$i]['longitud'] = '109.43ºW';
                        $this->data[$i]['altitud'] = "44";
                        break;
                    case 'Desierto de Atacama, Caldera Ad.':
                        $this->data[$i]['codigo_estacion'] = 270008;
                        $this->data[$i]['latitud'] = "27° 15' 16'' S";
                        $this->data[$i]['longitud'] = '70.78ºW';
                        $this->data[$i]['altitud'] = "197";
                        break; 
                    case 'Rodelillo, Ad.':
                        $this->data[$i]['codigo_estacion'] = 330007;
                        $this->data[$i]['latitud'] = "33° 3' 55'' S";
                        $this->data[$i]['longitud'] = '71.55ºW';
                        $this->data[$i]['altitud'] = "330";
                        break;
                    case 'La Florida, La Serena Ad.':
                        $this->data[$i]['codigo_estacion'] = 290004;
                        $this->data[$i]['latitud'] = "29° 54' 52'' S";
                        $this->data[$i]['longitud'] = '71.12ºW';
                        $this->data[$i]['altitud'] = "137";
                        break;
                    case 'Eulogio SÃ¡nchez, Tobalaba Ad.':
                        $this->data[$i]['codigo_estacion'] = 330019;
                        $this->data[$i]['latitud'] = "33° 27' 19'' S";
                        $this->data[$i]['longitud'] = '70.41ºW';
                        $this->data[$i]['altitud'] = "650";
                        break;
                    case 'Quinta Normal, Santiago':
                        $this->data[$i]['codigo_estacion'] = 330020;
                        $this->data[$i]['latitud'] = "33° 26' 42'' S";
                        $this->data[$i]['longitud'] = '70.41ºW';
                        $this->data[$i]['altitud'] = "534";
                        break;
                    case 'Chile Chico Ad.':
                        $this->data[$i]['codigo_estacion'] = 460001;
                        $this->data[$i]['latitud'] = "46° 35' 6'' S";
                        $this->data[$i]['longitud'] = '71.68ºW';
                        $this->data[$i]['altitud'] = "311";
                        break;
                    case 'Pudahuel Santiago ':
                        $this->data[$i]['codigo_estacion'] = 330021;
                        $this->data[$i]['latitud'] = "33° 22' 42'' S";
                        $this->data[$i]['longitud'] = '70.41ºW';
                        $this->data[$i]['altitud'] = "482";
                        break;
                    case 'Santo Domingo, Ad.':
                        $this->data[$i]['codigo_estacion'] = 330030;
                        $this->data[$i]['latitud'] = "33° 39' 22'' S";
                        $this->data[$i]['longitud'] = '71.61ºW';
                        $this->data[$i]['altitud'] = "77";
                        break;
                    case 'Juan FernÃ¡ndez, EstaciÃ³n MeteorolÃ³gica.':
                        $this->data[$i]['codigo_estacion'] = 330031;
                        $this->data[$i]['latitud'] = "33° 38' 9'' S";
                        $this->data[$i]['longitud'] = '78.83ºW';
                        $this->data[$i]['altitud'] = "40";
                        break;
                    case 'General Freire, CuricÃ³ Ad.':
                        $this->data[$i]['codigo_estacion'] = 340031;
                        $this->data[$i]['latitud'] = "34° 58' 10'' S";
                        $this->data[$i]['longitud'] = '71.14ºW';
                        $this->data[$i]['altitud'] = "229";
                        break;
                    case 'General Bernardo O\'Higgins, ChillÃ¡n Ad.':
                        $this->data[$i]['codigo_estacion'] = 360011;
                        $this->data[$i]['latitud'] = "36° 35' 9'' S";
                        $this->data[$i]['longitud'] = '72.01ºW';
                        $this->data[$i]['altitud'] = "155";
                        break;
                    case 'Carriel Sur, ConcepciÃ³n Ap.':
                        $this->data[$i]['codigo_estacion'] = 360019;
                        $this->data[$i]['latitud'] = "36° 46' 50'' S";
                        $this->data[$i]['longitud'] = '73.03ºW';
                        $this->data[$i]['altitud'] = "13";
                        break;
                    case 'María Dolores, Los Angeles Ad.':
                        $this->data[$i]['codigo_estacion'] = 370033;
                        $this->data[$i]['latitud'] = "37° 24' 10'' S";
                        $this->data[$i]['longitud'] = '72.42ºW';
                        $this->data[$i]['altitud'] = "120";
                        break;
                    case 'Maquehue, Temuco Ad.':
                        $this->data[$i]['codigo_estacion'] = 380013;
                        $this->data[$i]['latitud'] = "38° 46' 4'' S";
                        $this->data[$i]['longitud'] = '72.38ºW';
                        $this->data[$i]['altitud'] = "86";
                        break;
                    case 'Pichoy, Valdivia Ad.':
                        $this->data[$i]['codigo_estacion'] = 390006;
                        $this->data[$i]['latitud'] = "39° 39' 24'' S";
                        $this->data[$i]['longitud'] = '73.05ºW';
                        $this->data[$i]['altitud'] = "18";
                        break;
                    case 'CaÃ±al Bajo,  Osorno Ad.':
                        $this->data[$i]['codigo_estacion'] = 400009;
                        $this->data[$i]['latitud'] = "40° 36' 52'' S";
                        $this->data[$i]['longitud'] = '73.04ºW';
                        $this->data[$i]['altitud'] = "61";
                        break;
                    case 'El Tepual  Puerto Montt Ap.':
                        $this->data[$i]['codigo_estacion'] = 410005;
                        $this->data[$i]['latitud'] = "41° 26' 51'' S";
                        $this->data[$i]['longitud'] = '73.07ºW';
                        $this->data[$i]['altitud'] = "87";
                        break;
                    case 'FutaleufÃº Ad.':
                        $this->data[$i]['codigo_estacion'] = 430002;
                        $this->data[$i]['latitud'] = "43° 11' 20'' S";
                        $this->data[$i]['longitud'] = '71.85ºW';
                        $this->data[$i]['altitud'] = "347";
                        break;
                    case 'Alto Palena Ad.':
                        $this->data[$i]['codigo_estacion'] = 430004;
                        $this->data[$i]['latitud'] = "43° 36' 42'' S";
                        $this->data[$i]['longitud'] = '71.80ºW';
                        $this->data[$i]['altitud'] = "256";
                        break;
                    case 'Puerto AysÃ©n Ad.':
                        $this->data[$i]['codigo_estacion'] = 450001;
                        $this->data[$i]['latitud'] = "45° 23' 58'' S";
                        $this->data[$i]['longitud'] = '73.66ºW';
                        $this->data[$i]['altitud'] = "11";
                        break;
                    case 'Teniente Vidal, Coyhaique Ad.':
                        $this->data[$i]['codigo_estacion'] = 450004;
                        $this->data[$i]['latitud'] = "45° 35' 27'' S";
                        $this->data[$i]['longitud'] = '72.07ºW ';
                        $this->data[$i]['altitud'] = "299";
                        break;
                    case 'Balmaceda Ad.':
                        $this->data[$i]['codigo_estacion'] = 450005;
                        $this->data[$i]['latitud'] = "45° 55' 6'' S";
                        $this->data[$i]['longitud'] = '71.67ªW';
                        $this->data[$i]['altitud'] = "517";
                        break;
                    case 'Lord Cochrane Ad.':
                        $this->data[$i]['codigo_estacion'] = 470001;
                        $this->data[$i]['latitud'] = "47° 14' 38'' S";
                        $this->data[$i]['longitud'] = '72.58ºW';
                        $this->data[$i]['altitud'] = "209";
                        break;
                    case 'Teniente Gallardo, Puerto Natales Ad.':
                        $this->data[$i]['codigo_estacion'] = 510005;
                        $this->data[$i]['latitud'] = "51° 40' 2'' S";
                        $this->data[$i]['longitud'] = '72.52ºW';
                        $this->data[$i]['altitud'] = "69";
                        break;
                    case 'Carlos IbaÃ±ez, Punta Arenas Ap.':
                        $this->data[$i]['codigo_estacion'] = 520006;
                        $this->data[$i]['latitud'] = "53° 0' 6'' S";
                        $this->data[$i]['longitud'] = '70.51ºW';
                        $this->data[$i]['altitud'] = "36";
                        break;
                    case 'Fuentes Martínez, Porvenir Ad.':
                        $this->data[$i]['codigo_estacion'] = 530005;
                        $this->data[$i]['latitud'] = "53° 15' 13'' S";
                        $this->data[$i]['longitud'] = '70.32ºW';
                        $this->data[$i]['altitud'] = "25";
                        break;
                    case 'Guardiamarina ZaÃ±artu, Pto Williams Ad.':
                        $this->data[$i]['codigo_estacion'] = 550001;
                        $this->data[$i]['latitud'] = "54° 55' 54'' S";
                        $this->data[$i]['longitud'] = '67.63ºW';
                        $this->data[$i]['altitud'] = "12";
                        break;
                    case 'C.M.A. Eduardo Frei Montalva, AntÃ¡rtica ':
                        $this->data[$i]['codigo_estacion'] = 950001;
                        $this->data[$i]['latitud'] = "62° 11' 31'' S";
                        $this->data[$i]['longitud'] = '58.97ºW';
                        $this->data[$i]['altitud'] = "45";
                        break;
                }
                $aux += 11;
            }
        });
        //Guarda la informacion en la base de datos
        DataClimaController::store($this->data);
        
        return response()
                ->json($this->data);
    }
}
