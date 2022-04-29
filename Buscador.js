const form = document.querySelector('#form');
form.addEventListener('Keypress', filtrar)
const resul = document.querySelector('#resul');

const coches = [
    {nombre: 'Wolksvagen', valor: 50},
    {nombre: 'Audi', valor: 50},
    {nombre: 'Seat', valor: 50},
    {nombre: 'Sevilla', valor: 50}
]

const filtrar = ()=>{
    //console.log(form.value);
    resul.innerHTML = '';
    
    const texto = form.value.toLowerCase();
    for(let coches of coches){
        let nombre = coches.nombre.toLowerCase();
        if(nombre.indexOf(texto) !== -1){
            resul.innerHTML += `
           <li>${coches.nombre} - Valor: ${coches.valor}</li>
            `
        }
    }
    
    if(resul.innerHTML === ''){
        resul.innerHTML += `
           <li>Coche no encontrado..</li>
            `
    }
}

