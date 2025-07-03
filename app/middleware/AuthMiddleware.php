<?php
class AuthMiddleware
{
    public static function requireRole($expectedRole)
    {
        session_start();
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== $expectedRole) {
            require_once "../app/views/errors/404.php";
            exit;
        }
    }
}
