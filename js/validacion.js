const validCorreo = () => {
    user = document.getElementById('mail');
    //Miramos si la longitud del correo es difrente a 0
    if (user.value !== '') {
        //Comprueba mediante una regex si el correo es valido
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(user.value)) {
            //Correo válido
            user.style.borderColor = '';
            document.getElementById("mensaje1").innerHTML = '';
            return true;
        } else {
            //correo no válido
            user.style.borderColor = 'red';
            document.getElementById("mensaje1").innerHTML = '<p style="color: #ff1e00;"> Campo email incorrecto! </p>';
            return false;
        }
    } else {
        //correo no valido
        user.style.borderColor = 'red';
        document.getElementById("mensaje1").innerHTML = '<p style="color: #ff1e00;"> Campo email incorrecto! </p>';
        return false;
    }
}

const validPass = () => {
    pass = document.getElementById('pass');
    //comprobamos que la contraseña es válida según nuestros requisitos
    if (pass.value !== '') {
        //pass válida
        pass.style.borderColor = '';
        document.getElementById("mensaje2").innerHTML = '';
        return true;
    } else {
        //pass no válida
        pass.style.borderColor = 'red';
        document.getElementById("mensaje2").innerHTML = '<p style="color: #ff1e00;"> Campo obligatorio! </p>';
        return false;
    }
}

const validDNI = () => {
    user = document.getElementById('dni');
    //Miramos si la longitud del correo es difrente a 0
    if (user.value !== '') {
        //Comprueba mediante una regex si el correo es valido
        if (!/^[XYZ]?\d{5,8}[A-Z]$/.test(user.value)) {
            //Correo válido
            user.style.borderColor = '';
            document.getElementById("mensaje3").innerHTML = '';
            return true;
        } else {
            //correo no válido
            user.style.borderColor = 'red';
            document.getElementById("mensaje3").innerHTML = '<p style="color: #ff1e00;"> Campo dni incorrecto! </p>';
            return false;
        }
    } else {
        //correo no valido
        user.style.borderColor = 'red';
        document.getElementById("mensaje3").innerHTML = '<p style="color: #ff1e00;"> Campo dni incorrecto! </p>';
        return false;
    }
}

const validTel = () => {
    user = document.getElementById('telefono');
    //Miramos si la longitud del correo es difrente a 0
    if (user.value !== '') {
        //Comprueba mediante una regex si el correo es valido
        if (!(/^([0-9]+){9}$/.test(user.value))) {
            //Correo válido
            user.style.borderColor = '';
            document.getElementById("mensaje4").innerHTML = '';
            return true;
        } else {
            //correo no válido
            user.style.borderColor = 'red';
            document.getElementById("mensaje4").innerHTML = '<p style="color: #ff1e00;"> Campo telefono incorrecto! </p>';
            return false;
        }
    } else {
        //correo no valido
        user.style.borderColor = 'red';
        document.getElementById("mensaje4").innerHTML = '<p style="color: #ff1e00;"> Campo telefono incorrecto! </p>';
        return false;
    }
}

const valid = () => {
    if (validPass() && validCorreo() && validDNI() && validTel()) {
        return true;
    } else {
        return false;
    }
}