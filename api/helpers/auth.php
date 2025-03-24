<?php
// auth.php
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;

class Auth {
    private static $secretKey = 'mi_clave_secreta';

    public static function generarToken($usuario_id) {
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600;  // 1 hora
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'usuario_id' => $usuario_id
        ];

        return JWT::encode($payload, self::$secretKey);
    }

    public static function verificarToken($jwt) {
        try {
            $decoded = JWT::decode($jwt, self::$secretKey, ['HS256']);
            return (array) $decoded;
        } catch (Exception $e) {
            return null;
        }
    }
}
