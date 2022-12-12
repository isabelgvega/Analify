<?php

include 'sesion.php';
error_reporting(0);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="(max-width: 480px)" href="CSS/stylesMov.css"/>
    <link rel="stylesheet" media="(min-width: 481px)" href="CSS/stylesDesk.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Analify</title>
</head>
<body>
    <header>
        <div class="contenedorLogo">
            <img src="img/Analify_logo" alt="">
        </div>
    </header>

    <main>
        <section class="contenedorPrincipal">
            <div class="contenedorFormCancion">
                <a href="inicio.php" class="boton-inicio">VOLVER A INICIO</a>
                <form class="formCancion" action="conexionApis.php" method="post">
                    <h2>COMPARAR ARTISTAS</h2>
                    <input type="text" name="artista1" placeholder="Nombre del primer artista*" required>
                    <input type="text" name="artista2" placeholder="Nombre del segundo artista*" required>
                    <input type="submit" value="ENVIAR" id="botonForm">
                </form>
            </div>
            <div class="contenedorInfo">
                <?php if($_SESSION['popularity1'] != null && $_SESSION['popularity2'] != null){ ?>
                    <div class="contenedorInfo-texto">
                        <h1>RESULTADOS:</h1>
                        <p class="resultado"><b><?php echo $_SESSION['name1']?></b>:</p>
                        <p>Popularidad (valor del 1 al 100 calculado por spotify): <b><?php echo $_SESSION['popularity1']?></b></p>
                        <p>Nº de seguidores: <b><?php echo $_SESSION['followers1']?></b></p>
                        <p>Generos del Artista: <b><?php echo $_SESSION['firstGenre1'] . ', ' . $_SESSION['secondGenre1'] ?></b></p>
                        <p>Obra más escuchada (actualmente): <b><?php echo $_SESSION['albumName1']?></b> con popularidad: <b><?php echo $_SESSION['trackPopularity1'] ?></b></p>
                        <br>
                        <p class="resultado"><b><?php echo $_SESSION['name2']?></b>:</p>
                        <p>Popularidad (valor del 1 al 100 calculado por spotify): <b><?php echo $_SESSION['popularity2']?></b></p>
                        <p>Nº de seguidores: <b><?php echo $_SESSION['followers2']?></b></p>
                        <p>Generos del Artista: <b><?php echo $_SESSION['firstGenre2'] . ', ' . $_SESSION['secondGenre2'] ?></b></p>
                        <p>Obra más escuchada (actualmente): <b><?php echo $_SESSION['albumName2']?></b> con popularidad: <b><?php echo $_SESSION['trackPopularity2'] ?></b></p>
                    </div>

                    <div class="contenedorInfo-quesito">
                        <div style="background: conic-gradient(rgb(254, 192, 66) 0%<?php echo $_SESSION['popularity1']*100/($_SESSION['popularity1']+$_SESSION['popularity2']);
                        ?>%, rgb(10, 146, 172) <?php echo $_SESSION['popularity1']*100/($_SESSION['popularity1']+$_SESSION['popularity2']) ?>% 100%)" id="my-pie-chart"></div>
                        <div class="contenedorInfo-texto">
                            <h3 class="verde"><b><?php echo $_SESSION['name1']?></b></h3>
                            <h3 class="rojo"><b><?php echo $_SESSION['name2']?></b></h3>                     
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="contenedorInfoFooter">
            <p>Works with </p>
            <div class="contenedorSpotify">
                <i class="fa-brands fa-spotify"></i>
            </div>
            <div class="contenedorTwitter">
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
        <div class="contenedorFotoEsi">
            <img src="img/esi.png" alt="">
            <img src="img/uclm.png" alt="">
        </div>
    </footer>
</body>
</html>
