<?php
session_start();




$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];

$path=date('h-i-s-j-m-y')."-".$_FILES['img']['name']; 

if (empty($_POST['id'])){
    require_once '../model/carteleras.php';
    if (move_uploaded_file($_FILES['img']['tmp_name'],'../img/img_carteleras/'.$path)) {
        $resultado=Cartelera::crearCartelera($titulo, $descripcion,$path);
    }   
   
    echo "Creado"; 
    
        
}else{
    $id = $_POST['id'];
    require_once '../model/carteleras.php';  
    if (move_uploaded_file($_FILES['img']['tmp_name'],'../img/img_carteleras/'.$path)) {                   
        $resultado=Cartelera::Actualizar_Cartelera($id,$titulo, $descripcion,$path);    
    }
}
   

     

   

