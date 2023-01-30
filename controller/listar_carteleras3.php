<?php
session_start();
$filtro2=$_POST['filtro2'];
include '../model/carteleras.php';
$ListaCarteleras = Cartelera::TodasLasCarteleras($filtro2);

$ruta= "../img/img_carteleras/";

foreach ($ListaCarteleras as $cartelera) {

    echo "<tr>  
        <div class='mas_vistas'>
            <img src='../img/img_carteleras/" . $cartelera['img'] . "' alt='First slide'>              
            <button type='button' class='button-likes' onclick=like(" . $cartelera['id'] . ")><i class='fa-brands fa-gratipay i-likes'></i></button>                                                       
        </div>";
    echo "<tr>";
};