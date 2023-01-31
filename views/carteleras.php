<?PHP
session_start();
include '../model/usuarios.php';
$listaUsuarios = Usuario::getTipoUsuario($_SESSION['user']);
if ($listaUsuarios[0]['tipo'] !== 'admin') {
    echo "<script>window.location.href='../index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/ec31a4ddf0.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->
    <link rel="stylesheet" href="../css/styles.css">



</head>

<body>

    <div class="background3">

        <div class="busqueda">
            <form action="" method="post" id="frmbusqueda">
                <div class="filtro">
                    <input type="text" name="buscar" id="buscar" placeholder="Filtrar..." class="form-control">
                </div>
            </form>

            <form action="main.php">
                <button class="flecha_atras" ><i class="fa-regular fa-arrow-left-long-to-line"></i></button>
            </form>
            
            
        </div>

        <div class="formulario">
            <form method="post" id="frm" enctype="multipart/form-data">
                
                <input type="hidden" name="id" id="id" value="">
                <div>
                    <label for="titulo">Título</label>
                    <input id="titulo" type="text" name="titulo">
                    <p id="mensaje1"></p>
                </div>
                <div>
                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" type="text" name="descripcion">
                    <p id="mensaje1"></p>
                </div>
                <div>
                    <label for="img">Imagen</label>
                    <input id="img" type="file" name="img">
                    <p id="mensaje1"></p>
                </div>
                <input type="submit" class="btn-login" id="registrar" value="Registrar">
            </form>

        </div>
        <table class="tabla">
            <thead class="thead">
                <tr>
                    <th>IMG</th>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="resultado">

            </tbody>
        </table>





    </div>

    </div>


    <script src="../js/carteleras_crud.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>