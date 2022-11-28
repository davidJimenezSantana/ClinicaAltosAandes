
let btnEditarUsuario = document.getElementsByClassName("btn-editarUsuario");
let formularioEditarUsuario = document.getElementById("contenedor-formEditar");


//Mostrar y ocultar el formulario de editar
function abrirFormularioEditar() {
    var mostrar = formularioEditarUsuario.style.visibility;
    if (mostrar == "visible") {
        document.getElementById("formularioEditar").style.visibility = "hidden";

        formularioEditarUsuario.style.visibility = "hidden";
        formularioEditarUsuario.style.boxShadow = "none";
        formularioEditarUsuario.style.height = "0px";
    } else {
        document.getElementById("formularioEditar").style.visibility = "visible";

        formularioEditarUsuario.style.visibility = "visible";
        formularioEditarUsuario.style.boxShadow = "0px 0px 3px 1px black";
        formularioEditarUsuario.style.height = "100%";
    }

}

//Agregar los campos correspondientes del usuario 
//al formulario de editar usuarios
function cargarContacto(id,nombre, apellido, correo, telefono, rol, especialidad) {
    let formEditar = document.getElementById("formularioEditar");
    formEditar.idusuario.value = id;
    formEditar.nombre.value = nombre;
    formEditar.apellido.value = apellido;
    formEditar.correo.value = correo;
    formEditar.tel.value = Number(telefono);
    formEditar.rol.value = Number(rol);
    formEditar.especialidad.value = Number(especialidad);
}


//Listener para todos los botones de editar usuario
for(var i = 0; i < btnEditarUsuario.length; i++){
    btnEditarUsuario[i].addEventListener("click", abrirFormularioEditar);
}

