<?php



$filtro=$_POST['filtro'];
include '../model/usuarios.php';
$ListaUsuarios=Usuario::getUsuarios($filtro);

// if ($usuario['telefono']=='') {
//     # code...
// }


foreach ($ListaUsuarios as $usuario) {
    echo "<tr>";
    echo "<td>" . $usuario['id'] . "</td>";
    echo "<td>" . $usuario['tipo'] . "</td>";
    echo "<td>" . $usuario['nombre'] . "</td>";
    echo "<td>" . $usuario['apellido'] . "</td>";
    echo "<td>" . $usuario['correo'] . "</td> ";   
    echo "<td>" . $usuario['dni'] . "</td>";
    echo "<td>" . $usuario['telefono'] . "</td>";

    if ($usuario['validacion']=='no') {
        echo "<td><button type='button'class='validacion'  onclick=ValidacionSi('" . $usuario['id'] . "')><i class='fa-solid fa-square-xmark'></i></button></td>";
    }else{
        echo" <td><button type='button'class='validacion'  onclick=ValidacionNo('" . $usuario['id'] . "')><i class='fa-solid fa-square-check'></i></button></td>";
    }    
    echo "<td>
    <button type='button'  onclick=Editar('" . $usuario['id'] . "')><i class='fa-solid fa-pen-to-square boton_editar'></i></button>
    <button type='button' onclick=Eliminar('" . $usuario['id'] . "')><i class='fa-solid fa-trash-can boton_eliminar'></i></button>
    </td>";    
    echo "</tr>";
};





