<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FolletoController extends Controller
{

    public function leerExcelFolletos($id_empresa, $clave_nivel, $descrip_ofi, $indentificadorEs)
    {

        /*  var_dump([
            $id_empresa,
            $clave_nivel,
            $descrip_ofi,
            $indentificadorEs,
        ]); */

        $contents = File::json("assets/json/folletos.json");

        foreach ($contents as $key) {
            if (($id_empresa == $key['id_empresa']) && ($clave_nivel == $key['clave_nivel']) && ($descrip_ofi == $key['descrip_ofi']) && ($indentificadorEs == $key['identificadorEsp'])) {
                $rutaRedireccion = $key['ruta_archivo'];
                break;
            } else {
                $rutaRedireccion = false;
            }
        }

        return $rutaRedireccion;
    }
}
