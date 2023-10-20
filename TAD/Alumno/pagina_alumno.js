function verificar(evento){
    if (confirm("¿Seguro que desea eiminar este alumno?")){
        return true
    }else{
        evento.preventDefault();

    }
}
let borrar = document.querySelectorAll(".borrar");

for ( let i = 0; i < borrar.length; i++){
    borrar[i].addEventListener('click', verificar );
}