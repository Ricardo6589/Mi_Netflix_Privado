<?php

include '../model/conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    echo "NOT ID";
    die();
}


$sql ="DELETE FROM carteleras WHERE id = ?";
$stmt=mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,"i",$id);  
mysqli_stmt_execute($stmt); 




if($stmt->execute()) {
    echo "OK";
    die();
} else {
    echo "NOT OK";
    die();
}