function like(id, user) {

    console.log(id, user);
    const formdata = new FormData();
    formdata.append('id', id);
    formdata.append('user', user);
    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/like.php');
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