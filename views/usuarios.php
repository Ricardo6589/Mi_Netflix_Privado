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
    <!-- <div class="loader-page"></div> -->



    <div class="background3">

        <div class="busqueda">
            <form action="" method="post" id="frmbusqueda">
                <div class="filtro">
                    <input type="text" name="buscar" id="buscar" placeholder="Filtrar..." class="form-control">
                </div>
            </form>
        </div>

        <div class="formulario">
            <form method="post" id="frm">

                <input type="hidden" name="id" id="id" value="">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value="admin">Admin</option>
                    <option value="cliente">Cliente</option>
                </select>


                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" name="nombre">



                <label for="apellido">Apellido</label>
                <input id="apellido" type="text" name="apellido">


                <label for="correo">Correo</label>
                <input id="correo" type="text" name="correo" placeholder="example@gmail.com">


                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password">


                <label for="dni">DNI</label>
                <input id="dni" type="text" name="dni">



                <label for="telefono">Telefono</label>
                <input id="telefono" type="text" name="telefono">


                <input type="button" value="Registrar" id="registrar" class="btn btn-outline-primary btn-block" class="close">
            </form>

        </div>

        <table class="tabla">
            <thead class="thead">
                <tr>
                    <th>ID</th>
                    <th>Personal</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>Telefono</th>
                    <th>Validacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="resultado">

            </tbody>

        </table>


    </div>


    <script src="../js/usuarios_crud.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>