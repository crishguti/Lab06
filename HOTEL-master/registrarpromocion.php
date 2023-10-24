<?php
//print_r($_POST);
if (empty($_POST["txtPromocion"]) || empty($_POST["txtDuracion"]) || empty($_POST["codigo"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$promocion = $_POST["txtPromocion"];
$duracion = $_POST["txtDuracion"];
$codigo = $_POST["codigo"];

$sentencia = $bd->prepare("INSERT INTO promociones(promocion, duracion, id_reserva) VALUES (?, ?, ?);");
$resultado = $sentencia->execute([$promocion, $duracion, $codigo]);

if ($resultado === TRUE) {
    header('Location: agregarPromocion.php?codigo=' . $codigo);
}
?>
