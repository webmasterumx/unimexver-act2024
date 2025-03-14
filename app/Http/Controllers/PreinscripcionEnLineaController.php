<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\Api;
use Dompdf\Dompdf;

class PreinscripcionEnLineaController extends Controller
{

    public $plantelInfo;

    public function index()
    {

        if (isset($_REQUEST['carrera'])) {
            if (!empty($_REQUEST['carrera'])) {
                session(['carrera_preinscripcion' => $_REQUEST['carrera']]);
                $carrera = $_REQUEST['carrera'];
            }
        } else { //? decision si la variable no se encuentra en la cadena
            session(['carrera_preinscripcion' => null]);
            $carrera = null;
        }

        if (isset($_REQUEST['nivel'])) {
            if (!empty($_REQUEST['nivel'])) {
                session(['nivel_preinscripcion' => $_REQUEST['nivel']]);
                $nivel = $_REQUEST['nivel'];
            }
        } else { //? decision si la variable no se encuentra en la cadena
            session(['nivel_preinscripcion' => null]);
            $nivel = null;
        }

        //dd(session("carrera_preinscripcion"));

        $utm_recurso = new UtmController();
        $dataUTM = $utm_recurso->iniciarUtmSource();

        return view('preinscripcionEnLinea.inicio', [
            "dataUTM" => $dataUTM,
            "carrera" => $carrera,
            "nivel" => $nivel,
        ]);
    }

    /**
     * Aqui mandamos los datos iniciales (correo y telefono)
     * si el servicio nos regresa dtos nulos el prospecto no existe 
     * y se le dara acceso al formulario de datos
     * de lo contraio se debe validar si esta matriculado
     * de no estarlo se le da acceso al formulario sig 
     * de estar matriculado se le preguntara si desea agendar llamada
     * 
     */

    public function validacionDeCorreo(Request $request)
    {
        session(['email' => $request->correo]);
        session(['telefono' => $request->telefono]);

        session(["preins_utm_source" => $request->utm_source]);
        session(["preins_utm_medium" => $request->utm_medium]);
        session(["preins_utm_campaign" => $request->utm_campaign]);
        session(["preins_utm_term" => $request->utm_term]);
        session(["preins_utm_content" => $request->utm_content]);

        session(['carrera_preinscripcion' => $request->carreraPrecargado]);
        session(['nivel_preinscripcion' => $request->nivelPrecargado]);

        $valores = array(
            "correoElectronico" => $request->correo,
            "numeroCelular" => $request->telefono,
        );

        $infoProspecto = app(ApiConsumoController::class)->verificaProspecto($valores);
        session(['folioCRM' => $infoProspecto['folioCRM']]);

        if ($infoProspecto['BanderaStd'] == "Considerar") {
            if ($infoProspecto['folioCRM'] == 0 || $infoProspecto['folioCRM'] == null || $infoProspecto['folioCRM'] == "") {
                /**
                 * el prospecto no esta en CRM
                 * por lo tanto se le dara acceso directo al formulario
                 * precargardo solo correo y telefono
                 * @return true
                 */

                session(['estadoCRM' => 0]);

                $respuesta['acceso'] = true;
                $respuesta['mensaje'] = "El prospecto tiene acceso al formulario.";
            } else {
                /**
                 * el prospecto esta en CRM
                 * se debe validar si esta matriculado o no
                 */

                if ($infoProspecto['matricula'] == "" || $infoProspecto['matricula'] == null) {
                    /**
                     * el prospecto no esta matriculado por lo cual se le dajara pasar al formulario de datos 
                     * precargando los datos que trae el formulario
                     * @return true
                     */

                    session(['estadoCRM' => 1]);

                    $respuesta['acceso'] = true;
                    $respuesta['mensaje'] = "El prospecto tiene acceso al formulario.";
                } else {
                    /**
                     * el prospecto esta matriculado por lo cual se le mostrara un mensaje para agendar llamada 
                     * @return false
                     */

                    $respuesta['acceso'] = false;
                    $respuesta['correoGuardado'] = $request->correo;
                    $respuesta['mensaje'] = "El prospecto ya esta matriculado, mandar mensaje para agendar llamada.";
                }
            }
        } elseif ($infoProspecto['BanderaStd'] == "Descartar") {
            $respuesta['acceso'] = "Descartar";
            $respuesta['mensaje'] = "El prospecto no tiene acceso al formulario.";
        }

        return response()->json($respuesta);
    }

    public function formDatosGenerales()
    {
        if (session()->has('email') == true) {
            $apiConsumo = new ApiConsumoController();
            $estados = $apiConsumo->getEstados();

            return view('preinscripcionEnLinea.formularioDatosGenerales', [
                "estados" => $estados
            ]);
        } else {
            redirect()->route('preinscripcion.linea');
        }
    }

    public function obtenerPromocion(Request $request)
    {

        $source = session("preins_utm_source");
        $medium = session("preins_utm_medium");
        $campaign = session("preins_utm_campaign");
        $term = session("preins_utm_term");
        $content = session("preins_utm_content");

        $valores = array(
            "clavePlantel" => $request->plantelSelect,
            "clavePeriodo" => $request->periodoSelect,
            "claveNivel" => $request->nivelSelect,
            "claveTurno" => $request->horarioSelect,
        );

        $promo = app(ApiConsumoController::class)->preinscripcionPromociones($valores);

        session(['Nombre' => $request->nombreInscripcion]);
        session(['ApPaterno' => $request->apellidoPatInscripcion]);
        session(['ApMaterno' => $request->apellidoMatInscripcion]);
        session(['Telefono' => $request->telefonoInscripcion]);
        session(['Celular' => $request->telefonoCelInscripcion]);
        session(['Calle' => $request->calleInscripcion]);
        session(['NumeroCalle' => $request->numeroInscripcion]);
        session(['Colonia' => $request->coloniaInscripcion]);
        session(['EstadoID' => $request->estadoInscripcion]);
        session(['MunicipioID' => $request->municipioInscripcion]);
        session(['PlantelID' => $request->plantelSelect]);
        session(['ClavePeriodo' => $request->periodoSelect]);
        session(['ClaveNivel' => $request->nivelSelect]);
        session(['ClaveCarrera' => $request->carreraSelect]);
        session(['ClaveTurno' => $request->horarioSelect]);
        session(['UtpSource' => ""]);
        session(['DescripCampPublicidad' => ""]);
        session(['CampaignMedium' => ""]);
        session(['CampaignTerm' => ""]);
        session(['CampaignContent' => ""]);
        session(['WebSiteURL' =>  env('APP_URL') . "App/Preinscripcion-online?utm_source=" . $source . "&utm_medium=" . $medium . "&utm_campaign=" . $campaign . "&utm_term=" . $term . "&utm_content=" . $content,]);
        session(['FechaDeNacimiento' => $request->diaNacimiento . '-' . $request->mesNacimiento . '-' . $request->yearNacimiento]);
        session(['precio' => $promo['Importe']]);
        session(['fechaLimite' => $promo['FechaFinalPromocion']]);

        return response()->json($promo);
    }

    public function registrarPreinscripcionEnLinea()
    {

        $valores = array(
            "folioCRM" => session('folioCRM'),
            "Email" => session("email"),
            "Nombre" => session("Nombre"),
            "ApPaterno" => session("ApPaterno"),
            "ApMaterno" => session("ApMaterno"),
            "Telefono" => session("Telefono"),
            "Celular" => session("Celular"),
            "Calle" => session("Calle"),
            "NumeroCalle" => session("NumeroCalle"),
            "Colonia" => session("Colonia"),
            "EstadoID" => session("EstadoID"),
            "MunicipioID" => session("MunicipioID"),
            "PlantelID" => session("PlantelID"),
            "ClavePeriodo" => session("ClavePeriodo"),
            "ClaveNivel" => session("ClaveNivel"),
            "ClaveCarrera" => session("ClaveCarrera"),
            "ClaveTurno" => session("ClaveTurno"),
            "UtpSource" => session("preins_utm_source"),
            "DescripCampPublicidad" => session("preins_utm_campaign"),
            "CampaignMedium" => session("preins_utm_medium"),
            "CampaignTerm" => session("preins_utm_term"),
            "CampaignContent" => session("preins_utm_content"),
            "WebSiteURL" => session("WebSiteURL"),
            "FechaDeNacimiento" => session("FechaDeNacimiento"),
        );

        $registro = app(ApiConsumoController::class)->registraProspectoCRMDesdePreinscripcionEnLinea($valores);

        /**
         *   "FolioCrm": 1083468,
         * "Matricula": "22590169-64",
         * "Success": true,
         * "FailureMessage": ""
         * 
         * ya matriculados
         * testing00_rectoria00@gmail.com
         * prueba@gmail.com
         */

        //dd($valores);


        if (isset($registro['Success'])) {
            //echo 'el procedimieto paso';
            if (isset($registro['Matricula'])) {

                if ($registro['Matricula'] == "" || $registro['FolioCrm'] == 0) {
                    //echo "matriculacion fallida";

                    $response['estado'] = false;
                    $response['mensaje'] = "Lo sentimos, ocurro un error inesperado, favor de verificar los datos introducidos";
                } else {
                    //echo "matriculacion exitosa";

                    session(['Matricula' => $registro['Matricula']]);
                    session(['FolioCrm' => $registro['FolioCrm']]);

                    SELF::getPlantelInfo();

                    $response['estado'] = true;
                    $response['matricula'] = session('Matricula');
                    $response['mensaje'] = "Registro completado";
                }

                //echo 'se matriculo correctamente';

            } else {
                $response['estado'] = false;
                $response['mensaje'] = "Lo sentimos, ocurro un error inesperado, favor de verificar los datos introducidos";
            }
        } else {
            $response['estado'] = false;
            $response['mensaje'] = "Lo sentimos, ocurro un error inesperado, favor de verificar los datos introducidos";
        }

        return response()->json($response);
    }

    public function fichaPDFGenerar()
    {
        SELF::getPlantelInfo();
        $dompdf = new Dompdf(array('enable_remote' => true));
        $dompdf->loadHtml('
        <div id="content">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <h1>' . $this->plantelInfo['empresa'] . '</h1>
                        <table width="100%">
                            <tr>
                                <td>
                                    <center>
                                        <img
                                            src="data:image/jpeg;base64,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" />
                                    </center>
                                </td>
                                <td>
                                    <p>
                                        <b>Plantel ' . $this->plantelInfo['nombre'] . '</b> <br>
                                        ' . $this->plantelInfo['direccion'] . '
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <div style="width: 100%; padding: 30px">
                            <div style="width: 80%; border: 1px solid #000; border-radius: 30px; padding: 10px;">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="width: 50%;">Nombre del Alumno:</td>
                                        <td style="width: 50%;">' . session('Nombre') . ' ' . session('ApPaterno') . ' ' . session('ApMaterno') . '</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Grado:</td>
                                        <td style="width: 50%;">Primer Cuatrimestre</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Grupo:</td>
                                        <td style="width: 50%;"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 50%;">Plantel:</td>
                                        <td style="width: 50%;">' . $this->plantelInfo['nombre'] . '</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                    <td style="width: 50%;">
                        <center>
                            <img width="250px"
                                src="data:image/png;base64,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" />
                        </center>
                        <div style="width: 100%; padding: 30px">
                            <div style="width: 80%; border: 1px solid #000; border-radius: 30px; padding: 10px;">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="text-align: center;">Número de Servicio:</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">' . $this->plantelInfo['ns'] . '</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div style="width: 100%; padding-left: 30px; padding-right: 30px;">
                            <table style="width: 100%">
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="width: 50%;">Referencia 1 </td>
                                                <td style="width: 50%;">
                                                    <input
                                                        style="border: 0; border-bottom: 2px solid #000; text-align: center;"
                                                        type="text" value="' . $this->plantelInfo["referencia"] . '">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%;">Referencia 2 </td>
                                                <td style="width: 50%;"></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%;">Matrícula (10 digitos) </td>
                                                <td style="width: 50%;">
                                                    <input
                                                        style="border: 0; border-bottom: 2px solid #000; text-align: center;"
                                                        type="text" value="' . session('Matricula') . '">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="width: 100%; padding: 30px">
                            <div style="width: 80%; border: 1px solid #000; border-radius: 30px; padding: 10px;">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="text-align: center;">Importe del Pago/ Déposito:</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">$' . session('precio') . '.00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        ');
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Ficha_Pago.pdf');
    }

    public function getPlantelInfo()
    {
        $idPlantel = session('PlantelID');

        switch ($idPlantel) {
            case 2:
                $this->plantelInfo['nombre'] = "IZCALLI";
                $this->plantelInfo['direccion'] = "Av. Del Vidrio 15  <br> Col. Plaza Dorada <br>  Cuautitlán Izcalli <br>  Edo. Méx. C.P. 54760 <br>  R.F.C. UME-901015-M13";
                $this->plantelInfo['empresa'] = "UNIVERSIDAD MEXICANA, S.C.";
                $this->plantelInfo['ns'] = "3171";
                $this->plantelInfo["referencia"] = "08700071031";
                break;
            case 3:
                $this->plantelInfo['nombre'] = "SATÉLITE";
                $this->plantelInfo['direccion'] = "Circuito Poetas 37 <br> Ciudad Satélite <br> Naucalpan de Juárez <br> Edo. Méx. C.P. 53100 <br> R.F.C. UMP-940128-2N5";
                $this->plantelInfo['empresa'] = "UNIVERSIDAD MEXICANA PLANTEL SATELITE S.C.";
                $this->plantelInfo['ns'] = "3172";
                $this->plantelInfo["referencia"] = "08700534783";
                break;
            case 4:
                $this->plantelInfo['nombre'] = "POLANCO";
                $this->plantelInfo['direccion'] = "Emilio Castelar 63 <br> Col. Polanco <br> Deleg. Miguel Hidalgo <br> Ciudad de México C.P. 11560 <br> R.F.C. UMP-000627-125";
                $this->plantelInfo['empresa'] = "UNIVERSIDAD MEXICANA PLANTEL CENTRAL, S.C.";
                $this->plantelInfo['ns'] = "3173";
                $this->plantelInfo["referencia"] = "05055915891";
                break;
            case 5:
                $this->plantelInfo['nombre'] = "VERACRUZ";
                $this->plantelInfo['direccion'] = "20 de Noviembre esq. Juan Enriquez 1004 <br> Colonia Ignacio Zaragoza <br> Veracruz <br> Veracruz de Ignacio de la Llave C.P. 91910 <br> R.F.C. UMP-970823-SCA";
                $this->plantelInfo['empresa'] = "UNIVERSIDAD MEXICANA PLANTEL VERACRUZ, S.C.";
                $this->plantelInfo['ns'] = "3376";
                $this->plantelInfo["referencia"] = "04855288945";
                break;
            case 6:
                $this->plantelInfo['nombre'] = "IZCALLI";
                $this->plantelInfo['direccion'] = "Av. Del Vidrio 15  <br> Col. Plaza Dorada <br>  Cuautitlán Izcalli <br>  Edo. Méx. C.P. 54760 <br>  R.F.C. UME-901015-M13";
                $this->plantelInfo['empresa'] = "UNIVERSIDAD MEXICANA, S.C.";
                $this->plantelInfo['ns'] = "3171";
                $this->plantelInfo["referencia"] = "08700071031";
                break;

            default:
                # code...
                break;
        }

        session(['nombre' => $this->plantelInfo['nombre']]);
        session(['direccion' => $this->plantelInfo['direccion']]);
        session(['empresa' => $this->plantelInfo['empresa']]);
        session(['ns' => $this->plantelInfo['ns']]);
        session(['referencia' => $this->plantelInfo['referencia']]);
    }

    public function getInfoProspecto()
    {

        $data = [
            "correoElectronico" => session('email'),
            "numeroCelular" => session('telefono'),
        ];

        $apiConsumo = new ApiConsumoController();
        $infoProspecto = $apiConsumo->verificaProspecto($data);

        return response()->json($infoProspecto);
    }

    function insertarRegistroActividadParaMatriculado()
    {

        $date_now = date('d-m-Y');
        $date_future = strtotime('+1 day', strtotime($date_now));
        $date_future = date('Y-d-m', $date_future);

        $data = [
            "folioCRM" => session('folioCRM'),
            "actRealizada" => 2,
            "estatusDetalle" => 10, // 10 es para interesado pero hay que preguntar cual es "Sin Atender"
            "tipoContacto" => 2,
            "fechaAgenda" => $date_future,
            "idRangoHr" => 2,
            "asistioPlantel" => false,
            "actividad" => "Actualización de datos Preinscripción en Línea.",
            "claveUsuario" => 90856, // por el momento se usuara este promotor en lo que nos definen al promotor por defecto
        ];

        var_dump($data);

        $insertarActividad = app(ApiConsumoController::class)->guardarActividadBitacora($data);

        var_dump($insertarActividad);
    }
}
