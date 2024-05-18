<?php
$fecha1 = new DateTime("1990-04-03");
$fecha2 = new DateTime($fecha_consultar);
$fecha_actual = strtotime(date("d-m-Y H:i:00", $fecha1->getTimestamp()));
$fecha_entrada = strtotime($fecha_consultar);
$diff = $fecha1->diff($fecha2);
$dias = $diff->days;
$reversa = false;
if ($fecha_actual > $fecha_entrada) {
    $reversa = true;
}
if ($reversa) {
    $dias = $dias % 365;
    if ($dias < 360) {
        $mes = 18-ceil($dias / 20);
        $dia = 20-$dias % 20;
    } else {
        $mes = 0;
        $dia = 365-$dias;
    }
} else {
    if ($dias >= 365) {
        $dias = $dias % 365;
    }
    if ($dias > 5) {
        $dias = $dias - 5;
        $diasmes  = $dias+1;
        $mes = ceil($diasmes / 20);
        $dia = $dias % 20;
    } else {
        $mes = 0;
        $dia = $dias % 20;
    }
}


$Query = $conn->query("SELECT imagen, significado, htmlCodigo FROM uinal WHERE idweb=" . $mes . ";");

$resultArray = array();

// Iterar sobre los resultados
while ($row = mysqli_fetch_assoc($Query)) {
    // Extraer los valores de la fila
    $imagen = $row['imagen'];
    $significado = $row['significado'];
    $htmlCodigo = $row['htmlCodigo'];
    
    // Aplicar substr al campo 'imagen' y almacenar el resultado en un nuevo array
    $query = substr($imagen, 3);
    
    // Agregar los valores procesados al array de resultados
    $resultArray[] = array(
        'imagen' => $query,
        'significado' => $significado,
        'htmlCodigo' => $htmlCodigo,
        'imagenDia' => 'assets/numerosMayas/'.$dia.'.png'
    );
}

return $resultArray;
?>
