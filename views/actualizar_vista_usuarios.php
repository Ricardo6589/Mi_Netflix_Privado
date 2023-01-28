<?php

include '../model/usuarios.php';
$id=$_POST['id'];

$ListaUsuarios=Usuario::getUsuarioId($id);

echo $ListaUsuarios;


