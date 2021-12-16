# API REST Clima

Se solicitó crear una aplicación REST capaz de conectarse a la [Dirección Meteorológica de Chile](https://climatologia.meteochile.gob.cl/application/diario/boletinClimatologicoDiario/actual) para obtener la información meteorológica de Chile.

## Funciones
 
| Comando | Descripción |
| --- | --- |
| `GET` climas/ | Obtiene la información sobre los datos meteorológicos de Chile. |
| `POST` register/ | Permite realizar el registro de un usuario y entregar un *token*. |
| `POST` login/ | Busca un correo utilizado para pasar un nuevo *token*. |
| `POST` logout/ | Elimina el *token* utilizado. |

## Formato JSON

| Nombre | Descripción |
| --- | --- |
| `codigo_estacion` | Código de tipo "integer" que corresponde a la estación. |
| `nombre_estacion` | Nombre de la estación de tipo "string". |
| `latitud` | Escalar de tipo “string”. |
| `longitud` | Escalar de tipo “string”. |
| `altitud` | Escalar de tipo “string”. |
| `precipitaciones` |  Escalar de tipo “float" que indica la cantidad de agua caída |
| `temperatura_maxima` | Escalar de tipo “float”. |
| `temperatura_minima` | Escalar de tipo “float”. |
| `fecha` | Fecha correspondiene de tipo "string". |