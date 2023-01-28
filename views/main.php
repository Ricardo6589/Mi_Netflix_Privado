<?php



session_start();
include '../model/conexion.php';
$sql = "SELECT validacion FROM usuarios WHERE correo= '{$_SESSION['user']}'";
$validacion = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($validacion);
$variable = $row['validacion'];

if (empty($_SESSION['user']) || $variable == 'no') {

    echo "<script>location.href='../index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/ec31a4ddf0.js" crossorigin="anonymous"></script>
    <!-- Estilos -->
    <link rel="stylesheet" href="../css/styles.css">


</head>

<body>
    <div class="background2">
        <div class="nav2">
            <div class="row">
                <div class="column-2">
                    <p>NETFLIX</p>
                </div>
                <div class="column-2">
                    <?php
                    include '../model/usuarios.php';
                    $listaUsuarios = Usuario::getTipoUsuario($_SESSION['user']);
                    if ($listaUsuarios[0]['tipo'] == 'admin') { ?>
                        <form action="usuarios.php">
                            <button><i class="fa-solid fa-users"></i></button>
                        </form>

                        <form action="carteleras.php">
                            <button><i class="fa-solid fa-clapperboard"></i></button>
                        </form>
                    <?php
                    } ?>

                </div>
            </div>
        </div>
        <?php
        include '../model/carteleras.php';
        $listaCarteleras = Cartelera::CartelerasDisponibles();
        ?>

        <div class="titulo-top_5 ">
            <h6>Mi lista</h6>
        </div>


        <div class="top_5-contain" id="top_5-contain">

        </div>


        <div class="titulo-Disponibles">
            <h6>Mas vistas</h6>
        </div>


        <div class="carousel-items">
            <?php

            foreach ($listaCarteleras as $cartelera) {

                echo "<tr>  
                    <div class='mas_vistas'>
                        <img src='../img/img_carteleras/" . $cartelera['img'] . "' alt='First slide'>              
                        <button type='button' class='button-likes' onclick=like(" . $cartelera['id'] . "," . "'{$_SESSION['user']}'" . ")><i class='fa-brands fa-gratipay i-likes'></i></button>                                                       
                    </div>";
                echo "<tr>";
            };
            ?>
        </div>
    </div>

    <script src="../js/carteleras"></script>
    <script src="../js/carrousel.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>