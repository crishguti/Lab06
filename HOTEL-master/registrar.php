<?php
// Check if the form was submitted

    if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtFecha"]) || empty($_POST["txtDNI"]) || empty($_POST["txtTipo"]) || empty($_POST["txthoraIngreso"]) || empty($_POST["txthoraSalida"])) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    // Include the database connection
    include_once 'model/conexion.php';

    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $dni = $_POST['txtDNI'];
    $fecha = $_POST['txtFecha'];
    $tipo = $_POST['txtTipo'];
    $hora_ingreso = $_POST['txthoraIngreso'];
    $hora_salida = $_POST['txthoraSalida'];
    $celular = $_POST['txtCelular'];

    $sentencia = $bd->prepare("INSERT INTO reservas(nombres, apellidos, DNI, Tipo_habitacion, Fecha_reserva, hora_ingreso, hora_salida, celular) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $tipo, $fecha, $hora_ingreso, $hora_salida, $celular]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }

?>
