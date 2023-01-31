function listar(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/listar_carteleras.php');
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


registrar.addEventListener("click", (e) => {

    e.preventDefault();

    var respuesta_ajax = document.getElementById('resultado')

    var form = document.getElementById('frm');

    var formdata = new FormData(form);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/crear_actualizar_cartelera.php');

    ajax.onload = function() {
        if (ajax.status === 200) {

            if (ajax.responseText == "Creado") {
                Swal.fire({
                    icon: 'success',
                    title: 'Registrada',
                    showConfirmButton: false,
                    timer: 1500
                });
                form.reset();
                listar('');
            } else {

                Swal.fire({
                    icon: 'success',
                    title: 'Modificada',
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
                'Cartelera eliminada con exito.',
                'success'
            )

            //generar ajax
            const formdata = new FormData();
            formdata.append('id', id);
            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../controller/eliminar_cartelera.php');
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

function Editar(id) {
    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../views/actualizar_vista_carteleras.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            document.getElementById('id').value = json.id;
            document.getElementById('titulo').value = json.titulo;
            document.getElementById('descripcion').value = json.descripcion;
            document.getElementById('registrar').value = "Actualizar"
        }
    }
    ajax.send(formdata);
}


function like(id) {
    console.log(id);
    const formdata = new FormData();
    formdata.append('id', id);
    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../vista/like.php');
    ajax.onload = function() {
        if (ajax.status == 200) {

            if (ajax.responseText == "OK") {

                Swal.fire({
                    title: 'like eliminado ',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                })

            }
        } else {
            alert('me gusta');
        }






    }
    ajax.send(formdata);
}