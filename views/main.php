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

                    <form action="../index.php">
                    <button ><i class="fa-regular fa-arrow-left-long-to-line"></i></button>
                    </form>

                </div>
            </div>
        </div>
       

        <div class="titulo-Disponibles ">
            <h6>Mi lista</h6>
        </div>

        <div class="carousel-items" id="top_5-contain">
       
        </div>

        <div class="titulo-Disponibles">
            <h6>Disponibles</h6>
        </div>

        <div class="busqueda">
            <form action="" method="post" id="frmbusqueda">
                <div class="filtro">
                    <input type="text" name="buscar" id="buscar" placeholder="Filtrar..." class="form-control">
                </div>
            </form>
        </div>
        
        <div class="carousel-items" id="carousel-items">
            
        </div>
    </div>

    <script src="../js/carteleras.js"></script>
    <script src="../js/carrousel.js"></script>   
</body>

</html>