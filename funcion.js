const button = document.querySelector("button");
const input = document.querySelector("input");
const perso = document.querySelector(".per-container")

button.addEventListener("Click", (e) => {
    e.preventDefault();
    traerPersonaje(input.value)
})

function traerPersonaje(personaje){
    fetch (`https://rickandmortyapi.com/api/character/${personaje}`)
    .then((res) => res.json())
    .then ((data) => {
        crearPersonaje(data);
    })
}
function crearPersonaje(personaje) {
    const ima = document.createElement('img');
    ima.src = personaje.image

    const nom = document.createElement("h3");
    nom.textContent = personaje.name;

    const sta = document.createElement("h3");
    sta.textContent = personaje.status;

    const spe = document.createElement("h3");
    spe.textContent = personaje.species;

    const div= document.createElement("div");
    div.appendChild(ima);
    div.appendChild(nom);
    div.appendChild(sta);
    div.appendChild(spe);

    perso.appendChild(div);
}