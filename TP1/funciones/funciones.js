const numero = document.getElementById("numero").value;
const contenedor = document.getElementById("contenedor");
function traerPersonaje(){
    fetch("https://rickandmortyapi.com/api/character/")
    .then(res => res.json())
    .then(data => {
        console.log(data.results);
        data.results.forEach(function(personaje) {
            if(numero == personaje.id){
                contenedor.innerHTML = `<p>Nombre: ${personaje.name}</p>
                <p>Especie: ${personaje.species}</p>
                <p>Estado: ${personaje.status}</p>
                <img src= ${personaje.image}>`
            }
        });
    })
}