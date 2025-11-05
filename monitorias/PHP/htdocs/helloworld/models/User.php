<?php
require_once __DIR__ . '/../core/Model.php';

class User extends Model
{
    // Indica la tabla asociada al modelo
    protected static string $table = 'users';
}