<?php

class CsrfMiddleware
{
    public static function verifyRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';

            if (!CSRF::validateToken($token)) {
                // Bisa diganti redirect atau flash error
                die('CSRF token tidak valid atau expired!');
            }
        }
    }
}
