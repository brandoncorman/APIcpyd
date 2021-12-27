<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EstimacionController extends Controller
{
    private $latitud = array();
    private $longitud = array();
    private $temperaturaMaxima = array();
    private $temperaturaMinima = array();
    private $precipitaciones = array();

    public function estimacion ($longitud, $latitud) {

        $this->latitud = DB::table('data_climas')->select('latitud')->get();
        $this->longitud = DB::table('data_climas')->select('longitud')->get();
        $this->temperaturaMaxima = DB::table('data_climas')->select('temperatura_maxima')->get();
        $this->temperaturaMinima = DB::table('data_climas')->select('temperatura_minima')->get();
        $this->precipitaciones = DB::table('data_climas')->select('precipitaciones')->get();
        $longitudapi = $longitud;
        $latitudapi = $latitud;
        $Latitud1 = 0;
        $longitud1 = 0;
        $temperatura_max1 = 0;
        $temperatura_min1 = 0;
        $precipitacion1 = 0;
        $Latitud2 = 0;
        $longitud2 = 0;
        $temperatura_max2 = 0;
        $temperatura_min2 = 0;
        $precipitacion2 = 0;

        switch($latitudapi)
        {
            case($latitudapi > 18.21 && $latitudapi < 20.32):
                $Latitud1 = $this->splitla($this->latitud[0]->latitud);
                $longitud1 = $this->splitlo($this->longitud[0]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[0]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[0]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[0]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[1]->latitud);
                $longitud2 = $this->splitlo($this->longitud[1]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[1]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[1]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[1]->precipitaciones;
                break;
            case($latitudapi > 20.32 && $latitudapi < 22.29):
                $Latitud1 = $this->splitla($this->latitud[1]->latitud);
                $longitud1 = $this->splitlo($this->longitud[1]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[1]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[1]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[1]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[2]->latitud);
                $longitud2 = $this->splitlo($this->longitud[2]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[2]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[2]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[2]->precipitaciones;
                break;
            case($latitudapi > 22.29 && $latitudapi < 23.27):
                $Latitud1 = $this->splitla($this->latitud[2]->latitud);
                $longitud1 = $this->splitlo($this->longitud[2]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[2]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[2]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[2]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[3]->latitud);
                $longitud2 = $this->splitlo($this->longitud[3]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[3]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[3]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[3]->precipitaciones;
                break;
            case($latitudapi > 23.27 && $latitudapi < 27.9):
                $Latitud1 = $this->splitla($this->latitud[3]->latitud);
                $longitud1 = $this->splitlo($this->longitud[3]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[3]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[3]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[3]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[4]->latitud);
                $longitud2 = $this->splitlo($this->longitud[4]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[4]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[4]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[4]->precipitaciones;
                break;
            case($latitudapi > 27.9 && $latitudapi < 29.54):
                $Latitud1 = $this->splitla($this->latitud[4]->latitud);
                $longitud1 = $this->splitlo($this->longitud[4]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[4]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[4]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[4]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[5]->latitud);
                $longitud2 = $this->splitlo($this->longitud[5]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[5]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[5]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[5]->precipitaciones;
                break;
            case($latitudapi > 29.54 && $latitudapi < 33.22):
                $Latitud1 = $this->splitla($this->latitud[5]->latitud);
                $longitud1 = $this->splitlo($this->longitud[5]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[5]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[5]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[5]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[10]->latitud);
                $longitud2 = $this->splitlo($this->longitud[10]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[10]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[10]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[10]->precipitaciones;
                break;
            case($latitudapi > 33.22 && $latitudapi < 33.26):
                $Latitud1 = $this->splitla($this->latitud[10]->latitud);
                $longitud1 = $this->splitlo($this->longitud[10]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[10]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[10]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[10]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[9]->latitud);
                $longitud2 = $this->splitlo($this->longitud[9]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[9]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[9]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[9]->precipitaciones;
                break;
            case($latitudapi > 33.26 && $latitudapi < 33.27):
                $Latitud1 = $this->splitla($this->latitud[9]->latitud);
                $longitud1 = $this->splitlo($this->longitud[9]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[9]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[9]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[9]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[8]->latitud);
                $longitud2 = $this->splitlo($this->longitud[8]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[8]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[8]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[8]->precipitaciones;
                break;
            case($latitudapi > 33.27 && $latitudapi < 33.38):
                $Latitud1 = $this->splitla($this->latitud[8]->latitud);
                $longitud1 = $this->splitlo($this->longitud[8]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[8]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[8]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[8]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[11]->latitud);
                $longitud2 = $this->splitlo($this->longitud[11]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[11]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[11]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[11]->precipitaciones;
                break;
            case($latitudapi > 33.38 && $latitudapi < 34.58):
                $Latitud1 = $this->splitla($this->latitud[11]->latitud);
                $longitud1 = $this->splitlo($this->longitud[11]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[11]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[11]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[11]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[12]->latitud);
                $longitud2 = $this->splitlo($this->longitud[12]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[12]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[12]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[12]->precipitaciones;
                break;            
            case($latitudapi > 34.58 && $latitudapi < 36.35):
                $Latitud1 = $this->splitla($this->latitud[12]->latitud);
                $longitud1 = $this->splitlo($this->longitud[12]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[12]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[12]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[12]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[13]->latitud);
                $longitud2 = $this->splitlo($this->longitud[13]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[13]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[13]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[13]->precipitaciones;
                break;
            case($latitudapi > 36.35 && $latitudapi < 36.46):
                $Latitud1 = $this->splitla($this->latitud[13]->latitud);
                $longitud1 = $this->splitlo($this->longitud[13]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[13]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[13]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[13]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[14]->latitud);
                $longitud2 = $this->splitlo($this->longitud[14]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[14]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[14]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[14]->precipitaciones;
                break;
            case($latitudapi > 36.46 && $latitudapi < 38.46):
                $Latitud1 = $this->splitla($this->latitud[14]->latitud);
                $longitud1 = $this->splitlo($this->longitud[14]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[14]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[14]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[14]->precipitaciones;
                
                $Latitud2 = $this->splitla($this->latitud[15]->latitud);
                $longitud2 = $this->splitlo($this->longitud[15]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[15]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[15]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[15]->precipitaciones;
                break;
            case($latitudapi > 38.46 && $latitudapi < 39.39):
                $Latitud1 = $this->splitla($this->latitud[15]->latitud);
                $longitud1 = $this->splitlo($this->longitud[15]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[15]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[15]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[15]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[16]->latitud);
                $longitud2 = $this->splitlo($this->longitud[16]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[16]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[16]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[16]->precipitaciones;
                break;
            case($latitudapi > 39.39 && $latitudapi < 40.36):
                $Latitud1 = $this->splitla($this->latitud[16]->latitud);
                $longitud1 = $this->splitlo($this->longitud[16]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[16]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[16]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[16]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[17]->latitud);
                $longitud2 = $this->splitlo($this->longitud[17]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[17]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[17]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[17]->precipitaciones;
                break;
            case($latitudapi > 40.36 && $latitudapi < 41.26):
                $Latitud1 = $this->splitla($this->latitud[17]->latitud);
                $longitud1 = $this->splitlo($this->longitud[17]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[17]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[17]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[17]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[18]->latitud);
                $longitud2 = $this->splitlo($this->longitud[18]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[18]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[18]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[18]->precipitaciones;
                break;
            case($latitudapi > 41.26 && $latitudapi < 45.35):
                $Latitud1 = $this->splitla($this->latitud[18]->latitud);
                $longitud1 = $this->splitlo($this->longitud[18]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[18]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[18]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[18]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[19]->latitud);
                $longitud2 = $this->splitlo($this->longitud[19]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[19]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[19]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[19]->precipitaciones;
                break;
            case($latitudapi > 45.35 && $latitudapi < 45.55):
                $Latitud1 = $this->splitla($this->latitud[19]->latitud);
                $longitud1 = $this->splitlo($this->longitud[19]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[19]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[19]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[19]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[20]->latitud);
                $longitud2 = $this->splitlo($this->longitud[20]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[20]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[20]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[20]->precipitaciones;
                break;
            case($latitudapi > 45.55 && $latitudapi < 53.00):
                $Latitud1 = $this->splitla($this->latitud[20]->latitud);
                $longitud1 = $this->splitlo($this->longitud[20]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[20]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[20]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[20]->precipitaciones;
            
                $Latitud2 = $this->splitla($this->latitud[21]->latitud);
                $longitud2 = $this->splitlo($this->longitud[21]->longitud);
                $temperatura_max2 = $this->temperaturaMaxima[21]->temperatura_maxima;
                $temperatura_min2 = $this->temperaturaMinima[21]->temperatura_minima;
                $precipitacion2 = $this->precipitaciones[21]->precipitaciones;
                break;
            case($latitudapi > 53.00 && $latitudapi < 62.11):
                $Latitud1 = $this->splitla($this->latitud[20]->latitud);
                $longitud1 = $this->splitlo($this->longitud[20]->longitud);
                $temperatura_max1 = $this->temperaturaMaxima[20]->temperatura_maxima;
                $temperatura_min1 = $this->temperaturaMinima[20]->temperatura_minima;
                $precipitacion1 = $this->precipitaciones[20]->precipitaciones;
            
                $Latitud2 = 62 + 11*(1/60);
                $longitud2 = 58.97;
                $temperatura_max2 = 296.15;
                $temperatura_min2 = 280.15;
                $precipitacion2 = 0.166;
                break;
            default:
                return response()
                ->json(["resultado_max" => "Sin datos",
                        "resultado_min" => "Sin datos",
                        "resultado_precipitacion" => "Sin datos"]);
        }
        
        $distancia = $this->haversine($latitudapi,$Latitud1,$longitudapi,$longitud1);
        $distancia2 = $this->haversine($latitudapi,$Latitud2,$longitudapi,$longitud2);
        $resultado_max = ($this->interpolacion($distancia,$distancia2,$temperatura_max1,$temperatura_max2))-273.15;
        $resultado_min = ($this->interpolacion($distancia,$distancia2,$temperatura_min1,$temperatura_min2))-273.15;
        $resultado_precipitacion = ($this->interpolacion($distancia,$distancia2,$precipitacion1,$precipitacion2))*1000;
        return response()
                ->json(["resultado_max" => round($resultado_max, 1),
                        "resultado_min" => round($resultado_min, 1),
                        "resultado_precipitacion" => round($resultado_precipitacion, 2)]);
    }
    public function splitla($valor)
    {
        $separadoentres = explode(" ", $valor);
        $grado = explode ("°", $separadoentres[0]);
        $minuto = explode ("'", $separadoentres[1]);
        $segundo = explode ("''", $separadoentres[2]);
        return (float)$grado[0] + (float)$minuto[0]*(1/60) + (float)$segundo[0]*(1/3600);
    }

    public function splitlo($valor)
    {
        $conjunto = explode("º", $valor);
        return (float)$conjunto[0];
    }

    public function haversine ($latitud, $longitud, $latitud2, $longitud2)
    {
        $radio_tierra = 6378;

        $PI = 3.141592659;
        $latitud_radian = (float) $latitud * $PI / 180;
        $latitud2_radian = (float) $latitud2 * $PI / 180;
        $longitud_radian = (float) $longitud * $PI / 180;
        $longitud2_radian = (float) $longitud2 * $PI / 180;

        $diferencia_latitud = abs($latitud2_radian - $latitud_radian);
        $diferencia_longitud = abs($longitud2_radian - $longitud_radian);
        
        $A = pow(sin($diferencia_latitud/2),2) + cos($latitud)*cos($latitud2)* pow((sin($diferencia_longitud/2)),2);
        
        $C = 2 * atan2(sqrt($A),sqrt(1-$A));
        
        $distancia = $radio_tierra * $C;
        return $distancia;
    }
    
    public function interpolacion ($distancia, $distancia3, $temperatura, $temperatura3)
    {
        $resultado = $temperatura+(($temperatura3-$temperatura)/($distancia3+$distancia)*(0+$distancia));
        return $resultado;
    }   
}
