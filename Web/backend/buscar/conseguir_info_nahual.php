<?php
$formato = mktime(0, 0, 0, 1, 1, 1720) / (24 * 60 * 60);
$fecha = date("U", strtotime($fecha_consultar)) / (24 * 60 * 60);
$id = $fecha - $formato;
$nahual = $id % 20;
if ($nahual < 0) {
	$nahual = 19 + $nahual;
}
$Query = $conn->query("SELECT imagen, significado, htmlCodigo,imagenAnimal,cruzMaya,nombre FROM nahual WHERE idweb=".$nahual." ;");
$resultArray = array();

$for = mktime(0, 0, 0, 1, 1, 1720) / (24 * 60 * 60);
$fech = date("U", strtotime($fecha_consultar)) / (24 * 60 * 60);
$idd = $fech - $for;
$nn = $idd % 13;
if($nn<0){
	$nn=12+$nn;
}
if($nn==12){
	$nn = 1;
}else{
	$nn = $nn+2;
}

// Iterar sobre los resultados
while ($row = mysqli_fetch_assoc($Query)) {
    // Extraer los valores de la fila
    $imagen = $row['imagen'];
    $significado = $row['significado'];
    $htmlCodigo = $row['htmlCodigo'];
    $imagenAnimal = $row['imagenAnimal'];
    $cruzMaya = $row['cruzMaya'];
    $nombre = $row['nombre'];
    
    // Aplicar substr al campo 'imagen' y almacenar el resultado en un nuevo array
    $query = substr($imagen, 3);
    
    // Agregar los valores procesados al array de resultados
    $resultArray[] = array(
        'imagen' => $query,
        'significado' => $significado,
        'htmlCodigo' => $htmlCodigo,
        'imagenDia' => 'assets/numerosMayas/'.$nn.'.png',
        'imagenAnimal' => $imagenAnimal,
        'cruzMaya' => $cruzMaya,
        'nombre' => $nombre
    );
}

return $resultArray;


?>
