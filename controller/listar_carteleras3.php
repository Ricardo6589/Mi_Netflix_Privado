<?php
session_start();
$user = $_SESSION['user'];
$filtro2=$_POST['filtro2'];
include '../model/carteleras.php';
$ListaCarteleras = Cartelera::TodasLasCarteleras($filtro2);

include '../model/likes.php';


$ruta= "../img/img_carteleras/";

foreach ($ListaCarteleras as $cartelera) {
    
    $listaLikes = Like::getLikes($user,$cartelera['id']);

            echo "<tr>  
        <div class='mas_vistas'>
            <img src='../img/img_carteleras/" . $cartelera['img'] . "' alt='First slide'>";  
       
            
            if (empty($listaLikes)){
                echo "<button type='button' class='button-likes' onclick=like(" . $cartelera['id'] . ")><i class='fa-regular fa-heart'></i></button> ";
            }else{
                echo "<button type='button' class='button-likes2' onclick=like(" . $cartelera['id'] . ")><i class='fa-solid fa-heart'></i></button> "; 
            }
                  
            

        echo "</div>";
    echo "<tr>";
 

   
};