<?php
// index.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'models/Usuario.php';
include_once 'models/Nomina.php';
include_once 'models/Capacitacion.php';
include_once 'models/Reclutamiento.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
$resource = isset($uri[3]) ? $uri[3] : '';

switch($resource) {
    case 'usuarios':
        $usuario = new Usuario($db);
        if($request_method == 'GET') {
            $stmt = $usuario->read();
            $num = $stmt->rowCount();
            
            if($num > 0) {
                $usuarios_arr = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($usuarios_arr, $row);
                }
                http_response_code(200);
                echo json_encode($usuarios_arr);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "No se encontraron usuarios."));
            }
        }
        break;

    case 'nomina':
        $nomina = new Nomina($db);
        if($request_method == 'GET') {
            $stmt = $nomina->read();
            $num = $stmt->rowCount();
            
            if($num > 0) {
                $nomina_arr = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($nomina_arr, $row);
                }
                http_response_code(200);
                echo json_encode($nomina_arr);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "No se encontraron registros de nómina."));
            }
        }
        break;

    case 'capacitacion':
        $capacitacion = new Capacitacion($db);
        if($request_method == 'GET') {
            $stmt = $capacitacion->read();
            $num = $stmt->rowCount();
            
            if($num > 0) {
                $capacitacion_arr = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($capacitacion_arr, $row);
                }
                http_response_code(200);
                echo json_encode($capacitacion_arr);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "No se encontraron registros de capacitación."));
            }
        }
        break;

    case 'reclutamiento':
        $reclutamiento = new Reclutamiento($db);
        if($request_method == 'GET') {
            $stmt = $reclutamiento->read();
            $num = $stmt->rowCount();
            
            if($num > 0) {
                $reclutamiento_arr = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($reclutamiento_arr, $row);
                }
                http_response_code(200);
                echo json_encode($reclutamiento_arr);
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "No se encontraron registros de reclutamiento."));
            }
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(array("message" => "Recurso no encontrado."));
        break;
}
?>
