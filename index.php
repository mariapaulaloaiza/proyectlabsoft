<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/ligas.controlador.php";
require_once "controladores/catligas.controlador.php";
require_once "controladores/entrenadores.controlador.php";
require_once "controladores/entrenadorligas.controlador.php";
require_once "controladores/deportistas.controlador.php";
require_once "controladores/productos.controlador.php";
#require_once "controladores/clientes.controlador.php";
#require_once "controladores/ventas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/ligas.modelo.php";
require_once "modelos/catligas.modelo.php";
require_once "modelos/entrenadores.modelo.php";
require_once "modelos/entrenadorligas.modelo.php";
require_once "modelos/deportistas.modelo.php";
require_once "modelos/productos.modelo.php";
#require_once "modelos/clientes.modelo.php";
#require_once "modelos/ventas.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();