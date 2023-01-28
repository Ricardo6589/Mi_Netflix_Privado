<?php

include '../model/conexion.php';

if (isset($_POST['id']) && isset($_POST['user'])){
    $id = $_POST['id'];
    $user = $_POST['user'];
} else {
    echo "NOT ID";
    die();
}


$sql0="SELECT id FROM usuarios WHERE correo='$user'";

$user=$sql0;

var_dump($user);

die();

$sql = "SELECT * FROM likes WHERE id_usuarios='$user' and id_carteleras='$id'";
$resultado = mysqli_query($conexion,$sql);
$num=mysqli_num_rows($resultado);
mysqli_free_result($resultado);

if ($num!==1) {
    $sql2 ="INSERT INTO likes (id_usuarios,id_carteleras) VALUES (?,?)";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt,$sql2);
    mysqli_stmt_bind_param($stmt,"ii",$id,$user);  
    mysqli_stmt_execute($stmt); 
}else{

}



if($stmt->execute()) {
    echo "OK";
    die();
} else {
    echo "NOT OK";
    die();
}