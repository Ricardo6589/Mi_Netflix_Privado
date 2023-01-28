<?php
session_start();

$user=$_SESSION['user'];
include '../model/carteleras.php';
$listaCarteleras=Cartelera::getCartelerasLikesUsuario($user);

$ruta= "../img/img_carteleras/";

foreach ($listaCarteleras as $cartelera) {
    echo "<tr>  
    <td> <img class='' src=$ruta"."{$cartelera['img']}></td>  
    </td>        
    </tr>";
};