
<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd->query("select * from reservas");
    $reservas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


<div class="container w-100 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-gray-900 text-white">
                    <h2 class="card-title text-center font-weight-bold text-dark">SISTEMA ADMINISTRATIVO</h2>
                </div>
                <div class="header-button">
                    <a href="nuevo.php">
                        <button type="button" class="btn btn-primary my-button" style="background-color: #0099FF;">Agregar nuevo Cliente</button>
                    </a>
                </div>

    <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
                        placeholder="Buscador automatico">
                        <hr>
                        </form>
    </div>    




                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table  table_id table-striped w-100 max-width-lg">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Tipo de Habitacion</th>
                                    <th scope="col">Fecha de Reserva</th>
                                    <th scope="col">Ingreso</th>
                                    <th scope="col">Salida</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservas as $dato): ?>
                                    <tr>
                                        <td scope="row"><?php echo $dato->id; ?></td>
                                        <td><?php echo $dato->nombres; ?></td>
                                        <td><?php echo $dato->apellidos; ?></td>
                                        <td><?php echo $dato->DNI; ?></td>
                                        <td><?php echo $dato->Tipo_habitacion; ?></td>
                                        <td><?php echo $dato->Fecha_reserva; ?></td>
                                        <td><?php echo $dato->hora_ingreso; ?></td>
                                        <td><?php echo $dato->hora_salida; ?></td>
                                        <td><?php echo $dato->celular; ?></td>
                                        
                                        <td>
                                            <a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a>
                                            <a onclick="return confirm('¿Estás seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a>
                                            <td><a class="text-primary" href="agregarPromocion.php?codigo=<?php echo $dato->id; ?>">
                                            <i class="bi bi-cursor"></i></a></td>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include 'template/footer.php' ?>