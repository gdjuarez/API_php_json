<?php 
//

include("api.php");

$calle='';
$cruce='';
$provincia='';

 ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--fontawesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Apis Argentinas</title>

    <link rel="stylesheet" href="stylefondo.css">

    <style>
      .container{
        min-height: 550px;
      }
    </style>

</head>

<body>
    <nav class="navbar navbar-dark bg-danger">
        <a href="#" class="navbar-brand">APIs de ARGENTINA</a>
       <p> Obteniendo coordenadas </p>
    </nav>
    <div class="container border"  >
        <div class="row border">
               <div class="col-md-4 border">
                <div class="formulario-calle p-2">
                    <div class="alert alert-success">Coordenadas de cruce de calles de CABA</div>
                    <form action="index.php" method="POST">
                        <input type="text" id="calle" name="calle" value="<?php echo $calle ?>">
                        <input type="text" id="cruce" name="cruce" value="<?php echo $cruce ?>">
                        <input type="submit"  value="Buscar" class="btn btn-primary">
                    </form>

                    <?php 
                    if(isset($_POST['calle']) && ($_POST['calle'])){
                        $calle=$_POST['calle'];
                        $cruce=$_POST['cruce'];
                        getCoordenadas($calle,$cruce);
                    }else{
                        echo "No ingresó Datos";
                    }          
                    ?> 
                </div>
            </div>

            <div class="col-md-8 border">
                <div class="formulario_prov  p-2"> 
                <div class="alert alert-success">Coordenadas de las Provincias </div>
                    <form action="index.php" method="POST">
                        <input type="text"  name="provincias" value="<?php echo $provincia ?>" hidden>
                        <input type="submit"  value="Ver Provincias" class="btn btn-primary">
                    </form>

                    <?php 
                    if(isset($_POST['provincias'])){
                        getProvincias();
                    }else{
                        echo "No ingresó Datos";
                    }
                
                    ?> 
                </div>

            </div>

       

        </div>

    </div>



    <footer class="footer bg-dark rounded text-center text-white">
            <small>© Copyright 2023, GDJuarez</small>
    </footer>

    <!-- Option 1: Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>