<?php 
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];

    // Eliminar primero los registros relacionados en la tabla "promociones"
    $sentencia_promocion = $bd->prepare("DELETE FROM promociones where id_persona = ?;");
    $resultado_promocion = $sentencia_promocion->execute([$codigo]);

    // Luego, eliminar el registro de la tabla "persona"
    $sentencia_persona = $bd->prepare("DELETE FROM persona where id = ?;");
    $resultado_persona = $sentencia_persona->execute([$codigo]);

    if ($resultado_persona === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>