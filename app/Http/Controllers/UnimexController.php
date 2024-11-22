<?php

namespace App\Http\Controllers;

use App\Models\Acercade;
use App\Models\Banner;
use App\Models\CCarreras;
use App\Models\CLicenciaturas;
use App\Models\Investigacion;
use App\Models\LicenciaturaDistancia;
use App\Models\LicenciaturaSua;
use App\Models\Menu;
use App\Models\OfertaAcademica;
use App\Models\Plantel;
use App\Models\Posgrado;
use App\Models\PosgradoDistancia;
use App\Models\PreguntasFrecuentes;
use App\Models\Rvoe;
use App\Models\VentajasUnimex;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class UnimexController extends Controller
{

    private $utm_recurso;

    public function inicio(): View
    {

        $this->utm_recurso = new UtmController();
        $dataUTM = $this->utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();

        $listaCarreras = CCarreras::all();
        $banners = Banner::where('ubicacion', 0)->orWhere('ubicacion', 2)->orderBy('orden', 'ASC')->get();
        $ventajas_unimex = VentajasUnimex::all();

        return view('inicio', [
            "listaCarreras" => $listaCarreras,
            "banners" => $banners,
            "ventajas_unimex" => $ventajas_unimex,
            "dataUTM" => $dataUTM,
            "urlVisitada" => $urlVisitada
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
        $licenciatura = OfertaAcademica::where('slug', $slug)->where('id_tipo', 1)->first();

        $this->utm_recurso = new UtmController();
        $extrasController = new ExtrasUnimexController();
        $origen = $this->utm_recurso->comprovacionOrigen();
        $dataUTM = $this->utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();
        $arrayContraportadas = $extrasController->getArrayVentajasImg();

        //dd($licenciatura);

        if ($licenciatura != null) {

            $extras = json_decode($licenciatura->extras, true);
            $temario  = $extras['extras']['temario'];
            $campo_laboral = $extras['extras']['campo_laboral'];
            $disponibilidad = $extras['extras']['disponibilidad'];
            $abreviatura = $licenciatura->abreviatura;

            return view('licenciatura', [
                "licenciatura" => $licenciatura,
                "temario" => $temario,
                "campo_laboral" => $campo_laboral,
                "disponibilidad" => $disponibilidad,
                "origen" => $origen,
                "dataUTM" => $dataUTM,
                "abreviatura" => $abreviatura,
                "urlVisitada" => $urlVisitada,
                "contraportada" => $arrayContraportadas[random_int(0, 6)],
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function getLicenciaturaSua($slug): View
    {
        $this->utm_recurso = new UtmController();
        $origen = $this->utm_recurso->comprovacionOrigen();
        $dataUTM = $this->utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();

        $licenciatura_sua = LicenciaturaSua::where('slug', $slug)->first();
        if ($licenciatura_sua != null) {
            $extras = json_decode($licenciatura_sua->extras, true);
            $temario = $extras['extras']['temario'];
            $campo_laboral = $extras['extras']['campo_laboral'];
            $abreviatura = $licenciatura_sua->abreviatura;

            return view('licenciaturasua', [
                "licenciatura_sua" => $licenciatura_sua,
                "temario" => $temario,
                "campo_laboral" => $campo_laboral,
                "dataUTM" => $dataUTM,
                "origen" => $origen,
                "abreviatura" => $abreviatura,
                "urlVisitada" => $urlVisitada
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function getLicenciaturaDistancia($slug): View
    {

        $this->utm_recurso = new UtmController();
        $origen = $this->utm_recurso->comprovacionOrigen();
        $dataUTM = $this->utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();

        $licenciatura_distancia = OfertaAcademica::where('slug', $slug)->where("id_tipo", 2)->first();

        //dd($licenciatura_distancia);

        $temario = json_decode($licenciatura_distancia->extras, true);
        $campo_laboral = $temario["campoLaboral"];
        $rvoe = $temario["RVOE"];
        $abreviatura = $licenciatura_distancia->abreviatura;

        //dd($temario);
        //dd($abreviatura);


        return view('licenciaturadistancia', [
            "licenciatura_distancia" => $licenciatura_distancia,
            "temario" => $temario["temario"],
            "campo_laboral" => $campo_laboral,
            "rvoe" => $rvoe,
            "dataUTM" => $dataUTM,
            "origen" => $origen,
            "abreviatura" => $abreviatura,
            "urlVisitada" => $urlVisitada
        ]);
    }

    public function getPosgrado($slug): View
    {
        $this->utm_recurso = new UtmController();
        $extras = new ExtrasUnimexController();
        $origen = $this->utm_recurso->comprovacionOrigen();
        $dataUTM = $this->utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();
        $arrayContraportadas = $extras->getArrayVentajasPosgradosImg();
        //dd($arrayContraportadas[random_int(0, 4)]);

        $posgrado = OfertaAcademica::where('slug', $slug)->where("id_tipo", 3)->first();
        //dd($posgrado);

        if ($posgrado != null) {
            $extras = json_decode($posgrado->extras, true);
            $temario_especialidad = $extras['extras']['temario_especialidad'];
            $temario_maestria = $extras['extras']['temario_maestria'];
            $rvoe_especialidad = $extras['extras']['rvoe_especialidad'];
            $rvoe_maestria = $extras['extras']['rvoe_maestria'];
            $abreviatura = $posgrado->abreviatura;

            return view('posgrado', [
                "posgrado" => $posgrado,
                "temario_especialidad" => $temario_especialidad,
                "temario_maestria" => $temario_maestria,
                "rvoe_especialidad" => $rvoe_especialidad,
                "rvoe_maestria" => $rvoe_maestria,
                "dataUTM" => $dataUTM,
                "origen" => $origen,
                "abreviatura" => $abreviatura,
                "urlVisitada" => $urlVisitada,
                "contraportada" => $arrayContraportadas[random_int(0, 4)],
            ]);
        } else {
            return view('errors.404');
        }
    }

    public function getPosgradoDistancia($slug): View
    {

        $this->utm_recurso = new UtmController();
        $extras = new ExtrasUnimexController();
        $origen = $this->utm_recurso->comprovacionOrigen();
        $dataUTM = $this->utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();
        $arrayContraportadas = $extras->getArrayVentajasPosDisImg();

        $posgrado = OfertaAcademica::where('slug', $slug)->where("id_tipo", 4)->first();

        if ($posgrado != null) {
            $extras = json_decode($posgrado->extras, true);
            $temario_especialidad = $extras['extras']['temario_especialidad'];
            $temario_maestria = $extras['extras']['temario_maestria'];
            $rvoe_especialidad = $extras['extras']['rvoe_especialidad'];
            $rvoe_maestria = $extras['extras']['rvoe_maestria'];
            $abreviatura = $posgrado->abreviatura;

            return view('posgradosdistancia', [
                "posgrado" => $posgrado,
                "temario_especialidad" => $temario_especialidad,
                "temario_maestria" => $temario_maestria,
                "rvoe_especialidad" => $rvoe_especialidad,
                "rvoe_maestria" => $rvoe_maestria,
                "dataUTM" => $dataUTM,
                "origen" => $origen,
                "abreviatura" => $abreviatura,
                "urlVisitada" => $urlVisitada,
                "contraportada" => $arrayContraportadas[random_int(0, 2)],
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

        $utm_recurso = new UtmController();
        $dataUTM = $utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();

        return view('calculaTuCuota', [
            "dataUTM" => $dataUTM,
            "urlVisitada" => $urlVisitada
        ]);
    }

    public function contacto(): View
    {
        $this->utm_recurso = new UtmController();
        $dataUTM = $this->utm_recurso->iniciarUtmSource();
        $urlVisitada = URL::full();

        return view('contacto', [
            "dataUTM" => $dataUTM,
            "urlVisitada" => $urlVisitada
        ]);
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

    public function bolsaDeTrabajo(): View
    {

        return view('bolsa_de_trabajo');
    }
}
