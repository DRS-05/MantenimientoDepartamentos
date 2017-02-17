<?php
/*
 * Configuración para la navegación entre páginas
 *
 * Autor: Pablo Mora Martín
 * Fecha de última modificación: 23/01/2017
 */
//Array con la lista de controladores disponibles. Clave - Valor (nombre del archivo)
$controladores =[
    'inicio' => 'controller/cInicio.php',
    'login' => 'controller/cLogin.php',
    'indexDepartamento' => 'controller/cIndexDepartamento.php',
    'borrarDepartamento' => 'controller/cBorrarDepartamento.php',
    'editarDepartamento' => 'controller/cEditarDepartamento.php'
];

//Array con la lista de vistas disponibles. Clave - Valor (nombre del archivo)
$vistas = [
    'inicio' => 'view/vInicio.php',
    'login' => 'view/vLogin.php',
    'indexDepartamento' => 'view/vIndexDepartamento.php',
    'borrarDepartamento' => 'view/vBorrarDepartamento.php',
    'editarDepartamento' => 'view/vEditarDepartamento.php'
];
?>