function listar(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/listar_usuarios.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}
listar('');

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        listar('');
    } else {
        listar(filtro);
    }
});



registrar.addEventListener("click", () => {

    var respuesta_ajax = document.getElementById('resultado')

    var form = document.getElementById('frm');

    var formdata = new FormData(form);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/crear_actualizar_usuario.php');

    ajax.onload = function() {
        if (ajax.status === 200) {

            if (ajax.responseText == "Creado") {
                Swal.fire({
                    icon: 'success',
                    title: 'Registrado',
                    showConfirmButton: false,
                    timer: 1500
                });
                form.reset();
                listar('');
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Modificado',
                    showConfirmButton: false,
                    timer: 1500
                });
                registrar.value = "Registrar";
                id.value = "";
                listar('');
                form.reset();
            }
        } else {
            respuesta_ajax.innerText = 'Error';
        }
    }
    ajax.send(formdata);


});

function ValidacionSi(id) {

    const formdata = new FormData();
    formdata.append('id', id);
    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/validacionsi_usuario.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            if (ajax.responseText == "OK") {


                listar('');
            }
        } else {
            resultado.innerText = 'Error';
        }



    };
    ajax.send(formdata);
}


function ValidacionNo(id) {

    Swal.fire({
        title: 'Estas Seguro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deshabilitar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                    'Deshabilitado!',
                    'Usuario deshabilitado con exito.',
                    'success'
                )
                //generar ajax
            const formdata = new FormData();
            formdata.append('id', id);
            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../controller/validacionno_usuario.php');
            ajax.onload = function() {
                if (ajax.status == 200) {
                    if (ajax.responseText == "OK") {

                        listar('');
                    }
                } else {
                    resultado.innerText = 'Error';
                }


            };
            ajax.send(formdata);
        }

    })

}

function Eliminar(id) {

    Swal.fire({
        title: 'Estas Seguro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Eliminado!',
                'Usuario eliminado con exito.',
                'success'
            )

            //generar ajax
            const formdata = new FormData();
            formdata.append('id', id);
            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../controller/eliminar_usuario.php');
            ajax.onload = function() {
                if (ajax.status == 200) {
                    if (ajax.responseText == "OK") {
                        // alert('Elemento elmiminado con id: ' + id)
                        listar('');
                    }
                } else {
                    resultado.innerText = 'Error';
                }
            };
            ajax.send(formdata);
        }

    })

}


function Editar(id) {
    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../views/actualizar_vista_usuarios.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            // console.log(JSON.parse(ajax.response))
            console.log(ajax.response)
            var json = JSON.parse(ajax.responseText);
            document.getElementById('id').value = json.id;
            document.getElementById('tipo').value = json.tipo;
            document.getElementById('nombre').value = json.nombre;
            document.getElementById('apellido').value = json.apellido;
            document.getElementById('correo').value = json.correo;
            document.getElementById('password').value = json.password;
            document.getElementById('dni').value = json.dni;
            document.getElementById('telefono').value = json.telefono;
            document.getElementById('registrar').value = "Actualizar"
        }
    }
    ajax.send(formdata);


}