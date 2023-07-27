const personaje1 = document.getElementById("personaje1").value;
const personaje2 = document.getElementById("personaje2").value;
const contenedor1 = document.getElementById("contenedor1");
const contenedor2 = document.getElementById("contenedor2");
const comparacion = document.getElementById("comparacion");
let CantidadEpisodio1 = "";
let CantidadEpisodio2 = "";
let nombre1 = "";
let nombre2 = "";
function compararPersonajes(){
    fetch("https://rickandmortyapi.com/api/character/")
    .then(res => res.json())
    .then(data => {
        console.log(data.results);
        data.results.forEach(function(episodios) {
            if(personaje1 == episodios.id){
                contenedor1.innerHTML = `<p>Nombre: ${episodios.name}</p>
                <p>Especie: ${episodios.species}</p>
                <p>Estado: ${episodios.status}</p>
                <img src= ${episodios.image}>`
                CantidadEpisodio1 = episodios.episode.length;
                nombre1 = episodios.name;
            }
            if(personaje2 == episodios.id){
                contenedor2.innerHTML = `<p>Nombre: ${episodios.name}</p>
                <p>Especie: ${episodios.species}</p>
                <p>Estado: ${episodios.status}</p>
                <img src= ${episodios.image}>`
                CantidadEpisodio2 = episodios.episode.length;
                nombre2 = episodios.name;
            } 
        });
        if (CantidadEpisodio1 > CantidadEpisodio2){
            comparacion.innerHTML = `<p>${nombre1} aparece en más cantidad de episodios que ${nombre2}</p>`
        } else if (CantidadEpisodio1 < CantidadEpisodio2){
            comparacion.innerHTML = `<p>${nombre2} aparece en más cantidad de episodios que ${nombre1}</p>`
        } else if (CantidadEpisodio1 == CantidadEpisodio2){
            comparacion.innerHTML = `<p>${nombre1} y ${nombre2} aparecen en la misma cantidad de episodios</p>`
        }
    })
}