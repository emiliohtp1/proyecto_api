<?php
// api_response.php
class ApiResponse {
    public static function success($data = null, $message = 'Success', $code = 200) {
        http_response_code($code);
        return json_encode([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function error($message = 'Error', $code = 400) {
        http_response_code($code);
        return json_encode([
            'status' => 'error',
            'message' => $message
        ]);
    }

    public static function notFound($message = 'Resource not found') {
        return self::error($message, 404);
    }

    public static function serverError($message = 'Internal server error') {
        return self::error($message, 500);
    }

    public static function validationError($errors) {
        return self::error([
            'message' => 'Validation failed',
            'errors' => $errors
        ], 422);
    }
}
