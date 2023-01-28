<?php



$filtro=$_POST['filtro'];
include '../model/carteleras.php';
$listaCarteleras=Cartelera::getCarteleras($filtro);

$ruta= "../img/img_carteleras/";  
foreach ($listaCarteleras as $cartelera) {
    echo "<tr>  
    <td> <img class='' src=$ruta"."{$cartelera['img']}></td>    
    <td>" . $cartelera['id'] . "</td>
    <td>" . $cartelera['titulo'] . "</td>
    <td>" . $cartelera['descripcion'] . "</td> 
    <td>
    <button type='button'  onclick=Editar('" . $cartelera['id'] . "')><i class='fa-solid fa-pen-to-square boton_editar'></i></button>
    <button type='button' onclick=Eliminar('" . $cartelera['id'] . "')><i class='fa-solid fa-trash-can boton_eliminar'></i></button>
    </td>        
    </tr>";
};