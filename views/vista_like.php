<?php

include '../model/likes.php';
$id=$_POST['id'];

$ListaUsuarios=Usuario::getUsuarioId($id);
