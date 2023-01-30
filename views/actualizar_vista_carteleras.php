<?php

include '../model/carteleras.php';
$id=$_POST['id'];



$listaCarteleras=Cartelera::getCartelerasId($id);


