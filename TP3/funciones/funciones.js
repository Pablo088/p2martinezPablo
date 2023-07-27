const numero = document.getElementById("numero");
const userdiv = document.getElementById("user");
function traer(){
    var numrandom = Math.floor(Math.random()*826)+1;
    console.log(numrandom);
    fetch("https://rickandmortyapi.com/api/character/"+numrandom)
    .then(res => res.json())
    .then(data => {
    console.log(data)
        let nombrer = data.name;
        let generor = data.gender.toLowerCase();
        let estador = data.status;
        let fotor = `<img src= ${data.image}>`
        document.getElementById("personaje").innerHTML= `<h3>Personaje</h3>` 
        document.getElementById("nombre").innerHTML = nombrer;
        document.getElementById("genero").innerHTML = generor;
        document.getElementById("estado").innerHTML = estador;
        document.getElementById("foto").innerHTML = fotor;

        fetch ("https://randomuser.me/api/")
        .then (res => res.json())
        .then (data => {
            console.log(data);
            var user = data.results[0];
            userdiv.innerHTML = `
            <h3>Usuario</h3>
            <p><img src= "${user.picture.large}"></p>
            <p>Nombre: ${user.name.first}</p>
            <p>Apellido: ${user.name.last}</p>
            <p>Genero: ${user.gender}</p>
            `
            let generou = user.gender;

            if (generor == generou){
                document.getElementById("match").innerHTML = `<button>Match!</button>`
            } else {
                document.getElementById("match").innerHTML = `<button>No hay Match</button>`
            }
        })
        
})
}