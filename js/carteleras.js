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