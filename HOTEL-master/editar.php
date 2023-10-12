<?php include 'template/header.php' ?>

<?php
    if (!isset($_GET['codigo'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from reservas where id = ?;");
    $sentencia->execute([$codigo]);
    $reservas = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="txtNombres" required 
                        value="<?php echo $reservas->nombres; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type text" class="form-control" name="txtApellidos" autofocus required
                        value="<?php echo $reservas->apellidos; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI: </label>
                        <input type="text" class="form-control" name="txtDNI" autofocus required
                        value="<?php echo $reservas->DNI; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de habitacion: </label>
                        <input type="text" class="form-control" name="txtTipo" autofocus required
                        value="<?php echo $reservas->Tipo_habitacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de registro: </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required
                        value="<?php echo $reservas->fecha_reserva; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hora de ingreso: </label>
                        <input type="time" class="form-control" name="txthoraIngreso" autofocus required
                        value="<?php echo $reservas->hora_ingreso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora de salida: </label>
                        <input type="time" class="form-control" name="txthoraSalida" autofocus required
                        value="<?php echo $reservas->hora_salida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required
                        value="<?php echo $reservas->celular; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $reservas->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
