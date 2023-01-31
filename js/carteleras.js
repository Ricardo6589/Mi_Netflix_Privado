function listar() {

    let resultado = document.getElementById("top_5-contain");

    let formdata = new FormData();


    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/listar_carteleras2.php');
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

function listar2(filtro2) {

    let resultado = document.getElementById("carousel-items");

    let formdata = new FormData();
    formdata.append('filtro2', filtro2);


    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/listar_carteleras3.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}
listar2('');


buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        listar2('');
    } else {
        listar2(filtro);
    }
});



function like(id) {

    const formdata = new FormData();
    formdata.append('id', id);
    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/like.php');
    ajax.onload = function() {
        if (ajax.status == 200) {

            console.log(ajax.responseText);

            if (ajax.responseText == "OK") {

                listar('');
                listar2('');

            }
        } else {
            alert('me gusta');
        }

    }
    ajax.send(formdata);
}