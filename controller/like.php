<?php
session_start();
include '../model/conexion.php';



if (isset($_POST['id']) && isset($_SESSION['user'])){
    $id = $_POST['id'];
    $user = $_SESSION['user'];
} else {
    echo "NOT ID";
    die();
}


$sql0="SELECT id FROM usuarios WHERE correo='$user'";
$user = mysqli_query($conexion, $sql0); 
$user=mysqli_fetch_row($user); //Lo recojo como array
$user=implode("", $user); //Lo paso a string
$user=intval($user); //Lo paso a int



$sql1 = "SELECT * FROM likes WHERE id_usuarios='$user' and id_carteleras=$id";
$resultado = mysqli_query($conexion,$sql1);
$num=mysqli_num_rows($resultado);
mysqli_free_result($resultado);


if ($num==1 || $num>1) {

    $sql ="DELETE FROM likes WHERE id_usuarios=? and id_carteleras=?";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$user,$id);  
    mysqli_stmt_execute($stmt); 
   
}else{
    $sql ="INSERT INTO likes (id_usuarios,id_carteleras) VALUES (?,?)";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$user,$id);  
    mysqli_stmt_execute($stmt); 
}



if($stmt->execute()) {
    echo "OK";
    die();
} else {
    echo "NOT OK";
    die();
}