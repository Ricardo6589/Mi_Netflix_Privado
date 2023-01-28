<?php

include '../model/carteleras.php';
$id=$_POST['id'];

echo($id);

die();


$listaCarteleras=Cartelera::getCartelerasId($id);


