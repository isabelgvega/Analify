<?php 
include 'sesion.php'
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
    <main class="mainLogin">
        <form class="formLogin" action="validarLogin.php" method="POST">
            <h2>Iniciar Sesión</h2>
            <input type="text" placeholder="&#128272; Usuario" name="user">
            <input type="password" placeholder="&#128272; Contraseña" name="psw">
            <input type="submit" value="Validar">
            <?php if(isset($_SESSION['login']) and $_SESSION['login'] == 0){?>
                <p class="alertText">
                    Error al validar, vuelva a introducir sus credenciales.
                </p>
            <?php }?>
        </form>
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