<?php

namespace App\Http\Controllers;

use App\Models\Acercade;
use App\Models\Banner;
use App\Models\CCarreras;
use App\Models\CLicenciaturas;
use App\Models\Investigacion;
use App\Models\LicenciaturaSua;
use App\Models\Menu;
use App\Models\Plantel;
use App\Models\Posgrado;
use App\Models\PreguntasFrecuentes;
use App\Models\Rvoe;
use App\Models\VentajasUnimex;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class UnimexController extends Controller
{

    public function inicio(): View
    {
        //$listaCarreras = DB::table('c_carreras')->orderBy('titulo', 'asc')->get();
        $listaCarreras = CCarreras::all();
        $banners = Banner::where('ubicacion', 0)->orWhere('ubicacion', 1)->orderBy('orden', 'ASC')->get();
        $ventajas_unimex = VentajasUnimex::all();

        return view('inicio', [
            "listaCarreras" => $listaCarreras,
            "banners" => $banners,
            "ventajas_unimex" => $ventajas_unimex,
        ]);
    }

    public function getPlanteles($slug): View
    {
        $plantel = Plantel::where('nombre', $slug)->first();
        if ($plantel != null) {
            $galeria = json_decode($plantel->galeria);
            $plantelesInNot = Plantel::where('nombre', '!=', $slug)->get();

            return view('plantel', [
                "plantel" => $plantel,
                "galeria" => $galeria,
                "plantelesInNot" => $plantelesInNot
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function getAcercade($slug): View
    {
        $acercadeFirst = Acercade::where('slug', $slug)->first();

        if ($acercadeFirst != null) {
            $recomendaciones = Acercade::where('slug', '!=', $slug)->get();

            return view('acercade', [
                'acercadeFirst' => $acercadeFirst,
                "recomendaciones" => $recomendaciones
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function getLicenciatura($slug): View
    {
        $licenciatura = CLicenciaturas::where('slug', $slug)->first();

        if ($licenciatura != null) {

            $extras = json_decode($licenciatura->extras, true);
            $temario  = $extras['extras']['temario'];
            $campo_laboral = $extras['extras']['campo_laboral'];
            $disponibilidad = $extras['extras']['disponibilidad'];

            return view('licenciatura', [
                "licenciatura" => $licenciatura,
                "temario" => $temario,
                "campo_laboral" => $campo_laboral,
                "disponibilidad" => $disponibilidad,
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function getLicenciaturaSua($slug): View
    {
        $licenciatura_sua = LicenciaturaSua::where('slug', $slug)->first();
        if ($licenciatura_sua != null) {
            $extras = json_decode($licenciatura_sua->extras, true);
            $temario = $extras['extras']['temario'];
            $campo_laboral = $extras['extras']['campo_laboral'];

            return view('licenciaturasua', [
                "licenciatura_sua" => $licenciatura_sua,
                "temario" => $temario,
                "campo_laboral" => $campo_laboral
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function getPosgrado($slug): View
    {
        $posgrado = Posgrado::where('slug', $slug)->first();
        if ($posgrado != null) {
            $extras = json_decode($posgrado->temario, true);
            $temario_especialidad = $extras['extras']['temario_especialidad'];
            $temario_maestria = $extras['extras']['temario_maestria'];
            $rvoe_especialidad = $extras['extras']['rvoe_especialidad'];
            $rvoe_maestria = $extras['extras']['rvoe_maestria'];

            return view('posgrado', [
                "posgrado" => $posgrado,
                "temario_especialidad" => $temario_especialidad,
                "temario_maestria" => $temario_maestria,
                "rvoe_especialidad" => $rvoe_especialidad,
                "rvoe_maestria" => $rvoe_maestria,
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function preguntasFrecuentes(): View
    {

        $preguntasFrecuentes = PreguntasFrecuentes::all();

        return view('preguntasFrecuentes', [
            "preguntasFrecuentes" => $preguntasFrecuentes
        ]);
    }

    public function rvoe(): View
    {
        /* $rvoes = Rvoe::all(); */

        return view('rvoes');
    }

    public function investigacion(): View
    {
        $investigaciones = Investigacion::all();

        return view('investigacion', [
            "investigaciones" => $investigaciones
        ]);
    }

    public function calculaTuCuota(): View
    {
        return view('calculaTuCuota');
    }

    public function contacto(): View
    {

        return view('contacto');
    }

    public function cartaResultados($matricula): View
    {
        $valores = array(
            "Matricula" => $matricula
        );

        $resultados = app(ApiConsumoController::class)->resultadosExamen($valores);
        $fechaAcreditacion = $resultados['ResultadoExamen']['FechaAplicacion'];
        $fecha = explode('T', $fechaAcreditacion);

        return view('cartaResultados', [
            "resultados" => $resultados,
            "fecha" => $fecha
        ]);
    }

    public function bolsaDeTrabajo() : View {
        
        return view('bolsa_de_trabajo');

    }
}
