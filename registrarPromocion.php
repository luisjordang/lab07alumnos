<?php
//print_r($_POST);
if (empty($_POST["txtPromocion"]) || empty($_POST["txtDuracion"]) || empty($_POST["txtEnlace"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$promocion = $_POST["txtPromocion"];
$duracion = $_POST["txtDuracion"];
$enlace = $_POST["txtEnlace"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO promociones(promocion,duracion,enlace,id_persona) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$promocion,$duracion,$enlace, $codigo ]);

if ($resultado === TRUE) {
    header('Location: agregarPromocion.php?codigo='.$codigo);
} 
