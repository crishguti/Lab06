<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.promocion, pro.duracion, pro.id_reserva, res.nombres, res.apellidos, res.celular
  FROM promociones pro
  INNER JOIN reservas res ON res.id = pro.id_reserva
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$reserva = $sentencia->fetch(PDO::FETCH_OBJ);

$url = 'https://api.green-api.com/waInstance7103869853/sendMessage/72f3d506c936467fb69c90ceb76ad4fee73ebd850c134229b1';
$data = [
    "chatId" => "51" . $reserva->celular . "@c.us",
    "message" => 'Estimado(a) *' . strtoupper($reserva->nombres) . ' ' . strtoupper($reserva->apellidos) . '* No se pierda *' . strtoupper($reserva->promocion) . '* valido solo *' . $reserva->duracion . '*'
];
$options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => json_encode($data),
        'header' =>  "Content-Type: application/json\r\n" .
            "Accept: application/json\r\n"
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result);
header('Location: agregarPromocion.php?codigo=' . $reserva->id_reserva);
?>
