<?php 

function getCoordenadas($calle,$cruce){ 

        $datos= json_decode(file_get_contents( "http://servicios.usig.buenosaires.gob.ar/normalizar/?direccion='.$calle.'%20y%20'.$cruce.',%20caba"),true);
        // print_r($datos);              
        // echo "<hr>";
        $direcciones_normalizadas=$datos["direccionesNormalizadas"];
        //print_r($direcciones_normalizadas);

        $direcciones= $direcciones_normalizadas[0];
      
        $coordenadaX = $direcciones['coordenadas']['x'];
        $coordenadaY = $direcciones['coordenadas']['y'];

        $nombre_calle = $direcciones['nombre_calle'];
        $nombre_calle_cruce = $direcciones['nombre_calle_cruce'];
        $tipo =  $direcciones['tipo'];
        $cod_partido = $direcciones['cod_partido'];
        $direccion =  $direcciones['direccion'];

        echo '<div class="respuesta p-2 border">';
        echo 'Direccion: '.$direccion.'<br> Calle: '.$nombre_calle.'<br> Calle que cruza: '.$nombre_calle_cruce.'<br> Partido: '.strtoupper($cod_partido);
        echo '<br> coordenada X:'.$coordenadaX.'<br> coordenada Y:'. $coordenadaY;
        echo '<br></div>';

}

  
   //consumo API DEL GOBIERNO PROVINCIAS a la direccion puedo pasarle partametros como id , nombre 

   function getProvincias(){ 

      $datos= json_decode(file_get_contents( "https://apis.datos.gob.ar/georef/api/provincias?"),true);
      // print_r($datos["provincias"]);
      $provincias=$datos["provincias"];
      //echo "<br>";

      for ($i=0; $i < count($provincias); $i++) { 
          # code...
        $id=$provincias[$i]["id"];
        $nombre=$provincias[$i]["nombre"];
        $latitud=$provincias[$i]["centroide"]["lat"];
        $longuitud=$provincias[$i]["centroide"]["lon"];

        echo 'cod: '.$id.' Nombre: '.$nombre.' Lat: '.$latitud.' Long: '.$longuitud;
        echo '<br>';

      }
    
  }


  // getcoordenadas('paso','lavalle');

  // getProvincias();

?>