<?php
session_start();



$tipo=$_POST['tipo'];
$nombre=$_POST['nombre'];
$apellido = $_POST['apellido']; 
$correo = $_POST['correo'];
$password= hash('sha256', $_POST['password']);
$dni = $_POST['dni']; 
$telefono = $_POST['telefono'];
$validacion= 'no';
 

if (empty($_POST['id'])){
    require_once '../model/usuarios.php'; 
    $resultado=Usuario::crearUsuario($tipo,$nombre,$apellido, $correo,$password,$dni,$telefono,$validacion);
    if (isset($_POST['index'])){   
        echo "<script>location.href='../index.php'</script>"; 
    }else { 
        echo "Creado";
    }
    
        
}else{
    $id = $_POST['id'];
    require_once '../model/usuarios.php';                      
    $resultado=Usuario::Actualizar_Usuario($id,$tipo,$nombre,$apellido, $correo,$password,$dni,$telefono);
        
}
   




