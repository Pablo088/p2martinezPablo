const numeroProvincia = document.getElementById("numeroProvincia").value;
const textoProvincia = document.getElementById("textoProvincia");
const comprobar1 = document.getElementById("comprobar1");
var comp1 ="";
const numeroMunicipio = document.getElementById("numeroMunicipio").value;
const textoMunicipio = document.getElementById("textoMunicipio");
const comprobar2 = document.getElementById("comprobar2");
var comp2 = "";
var nombreMunicipio="";
var arrayMunicipio = [];
const estaDentro = document.getElementById("estaDentro");

function mandar(){
    if (numeroProvincia < 0 || numeroProvincia == null) {
        textoProvincia.innerHTML = `<h3>Ingrese un valor mayor a cero/ valor no nulo</h3>`
    } 
    if (numeroMunicipio < 0 || numeroMunicipio == null) {
        textoMunicipio.innerHTML = `<h3>Ingrese un valor mayor a cero/ valor no nulo</h3>`
    } 
    fetch ("asentamientos.json")
        .then((res) => res.json())
        .then(data => {
            console.log(data.localidades);
            data.localidades.forEach(function(localidad) {
                if(numeroProvincia == localidad.provincia.id) {
                    textoProvincia.innerHTML = `<h3>Provincia: ${localidad.provincia.nombre}</h3>
                    <p>Latitud: ${localidad.centroide.lat}</p>
                    <p>Longitud: ${localidad.centroide.lon}</p>`;
                    if(!(arrayMunicipio.includes(localidad.municipio.nombre))){
                        arrayMunicipio.push(localidad.municipio.nombre);
                    }
                comp1 = true; 
                }
                if(numeroMunicipio == localidad.municipio.id){
                    textoMunicipio.innerHTML = `<h3>Municipio: ${localidad.municipio.nombre}</h3>`
                    nombreMunicipio = localidad.municipio.nombre;
                    comp2=true;
                }  
            });
            if (comp1 != true){
                comprobar1.innerHTML =`<h3>No existe una provincia con la ID ingresada</h3>`
            }
            if (comp2 != true){
                comprobar2.innerHTML =`<h3>No existe un municipio con la ID ingresada</h3>`
            }
            if(arrayMunicipio.includes(nombreMunicipio)){
                estaDentro.innerHTML = `<p>El municipio se encuentra dentro de la provincia ingresada</p>`
            } else{
                estaDentro.innerHTML = `<p>El municipio no se encuentra dentro de la provincia ingresada</p>`
            }
            });
}