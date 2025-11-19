<?php
//pascalcase
require "controller/Usuariocontroller.php";
$controller = new controller;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $controller->guardar();
} else {
    $controller->index();
}

