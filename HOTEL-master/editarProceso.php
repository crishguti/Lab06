<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $dni = $_POST['txtDNI'];
    $tipo = $_POST['txtTipo'];
    $fecha = $_POST['txtFecha'];
    $hora_ingreso = $_POST['txthoraIngreso'];
    $hora_salida = $_POST['txthoraSalida'];
    $celular = $_POST['txtCelular'];

    $sentencia = $bd->prepare("UPDATE reservas SET nombres = ?, apellidos= ?, DNI = ?,Tipo_habitacion= ?,Fecha_reserva = ?,hora_ingreso = ?,hora_salida = ?,celular = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $tipo,$fecha,$hora_ingreso,$hora_salida ,$celular,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>