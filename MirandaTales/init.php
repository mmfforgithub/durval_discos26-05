<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'durval');
define('DB_USER', 'alunos');
define('DB_PASS', 'cefetmg');
function db_connect() {
    return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
}
?>