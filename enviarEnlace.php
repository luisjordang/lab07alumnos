<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.promocion, pro.duracion , pro.enlace, pro.id_persona, per.nombres , per.apellido_paterno ,per.apellido_materno,per.celular , per.fecha_nacimiento 
  FROM promociones pro  
  INNER JOIN persona per ON per.id = pro.id_persona 
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);

$url = 'https://api.green-api.com/waInstance1101816148/sendLink/09e4c65667064230af2f1ab45abb30c82e09c87119094ac198';
$data = [
    "chatId" => "51".$persona->celular."@c.us",
    "urlLink" => $persona->enlace
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

//header('Location: agregarPromocion.php?codigo='.$persona->id_persona);
?> 