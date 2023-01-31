<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos -->    
    <link rel="stylesheet" href="css/styles.css">    
    <title>Login</title>
</head>
<body>

<div class="background">
   <div class="nav"> 
        <div class="row">
            <div class="column-2"> 
               <p>NETFLIX</p> 
            </div>
            <div class="column-2">
                <button class="iniciar_sesion" id="iniciar_sesion">                    
                  <a>Iniciar sesión</a>   
                </button>                 
            </div>           
          
        </div>       
    </div>  

    <div class="row texto">
         <div class="contenido">
            <p> Todas las peliculas y series que desees, y mucho mas.</p>            
        </div>
        <div class="contenido">
        
            <p> Disfruta donde quieras. Cancela cuando quieras.</p>           
        </div>

        <div class="contenido">

            <button class="iniciar_sesion" id="registrar">                    
                <a>Registrar</a>   
            </button>    
                     
        </div>
    </div>   

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
        <div class="modal-content">
            <span id="close1" class="close">&times;</span>
            <div class="login">

                <div class="titulo">
                    <p>Login</p>

                </div>

                <div class="formulario">
                    <form action="./controller/login.php" method="post" onsubmit="return valid()">                
                        <div>
                            <label for="">Correo</label>
                            <input id="mail" type="text" name="mail" placeholder="example@gmail.com" onblur="validCorreo()">
                            <p id="mensaje1"></p>
                        </div>
                        <div>
                            <label for="">Contraseña</label>
                            <input id="pass" type="password" onblur="validPass()" name="pass" required >
                            <p id="mensaje2"></p>
                        </div>
                        <input type="submit"  id="submit" class="btn-login" value="Entrar" >
                    </form>

                </div>


            </div>

        </div>

    </div>      

    <!-- The Modal -->
    <div id="myModal2" class="modal">
         <!-- Modal content -->
    <div class="modal-content">
        <span class="close close2">&times;</span>
        <div class="login">
            <div class="titulo">
                <p>Registrar</p>
            </div>

            <div class="formulario">
                <form  action="./controller/crear_actualizar_usuario.php" method="post" onsubmit="return valid()">         

                        <input type="hidden" name="index" value="index">
                        <input id="tipo" type="hidden" name="tipo" value="cliente">
                        <div>
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="text" name="nombre" required>
                            <p id="mensaje3"></p>
                        </div>
                        <div>
                            <label for="apellido">Apellido</label>
                            <input id="apellido" type="text" name="apellido" required>
                            <p id="mensaje4"></p>
                        </div>
                        <div>
                            <label for="correo">Correo</label>
                            <input id="correo" type="text" name="correo" placeholder="example@gmail.com" onkeyup="validCorreo2()">
                            <p id="mensaje5"></p>
                        </div>
                        <div>
                            <label for="password">Contraseña</label>
                            <input id="password" type="password"  name="password" onblur="validPass2()" required>
                            <p id="mensaje6"></p>
                        </div>
                        <div>
                            <label for="dni">DNI</label>
                            <input id="dni" type="text" name="dni" onblur="validDNI()" required >
                            <p id="mensaje7"></p>
                        </div>
                        <div>
                            <label for="telefono">Telefono</label>
                            <input id="telefono" type="text" name="telefono" onblur="validTel()" required>
                            <p id="mensaje8"></p>
                        </div>
                        <input type="submit" class="btn-login" value="Registrar" >
                    </form>

                </div>


            </div>

        </div>

    </div>   
    </div>     

</div>

<div class="titulo-top_5 ">
    <h6>Top 5</h6> 
</div>

<?php

include './model/carteleras.php';
$listaCarteleras=Cartelera::top5();

?>
<div class="top_5-contain">
    <?php
    foreach ($listaCarteleras as $cartelera) {
        echo "<tr>  
        <div class='top_5'>
        <img src='./img/img_carteleras/".$cartelera['img']."' alt='First slide'>                  
        </div>";
    };
    ?>
</div>
<?php
$listaCarteleras=Cartelera::CartelerasDisponibles();
?>
<br>
<hr>
<div class="titulo-Disponibles ">
    <h6>Disponibles</h6>
</div>

<div class="carousel-items">
<?php
    foreach ($listaCarteleras as $cartelera) {
        echo "<tr>  
        <div class='mas_vistas'>    
        <img src='./img/img_carteleras/".$cartelera['img']."' alt='First slide'></div>";
    };
    ?>
    
</div>
 
<!-- Link js -->
<script src="js/modal.js"></script>
<script src="js/validacion.js"></script>
<script src="js/carrousel.js"></script>
</body>
</html>
