let formRegion = document.querySelector("#myFormRegion"); // seleccionamos el form de departamento
let myHeadersReg = new Headers({ "Content-Type": "application/json" }) //creamos el header que vamos a incluir en el fetch

// creamos un evento al boto de form de Departamento 
document.querySelector('#btnReg').addEventListener('click', async (e) => {

    e.preventDefault(); //prevenimos el comportamiento por defecto del formulario al oprimir el botton 
    let data = Object.fromEntries(new FormData(formRegion).entries()); //obtenemos los datos del form
    console.log(data)
    let config = { // creamos la configuaracion que se va a pasar al fetch
        method : "POST",
        headers : myHeadersReg,
        body : JSON.stringify(data)             
    };

    let respuesta = await (await fetch("scripts/Regiones/insertReg.php", config)).text(); //realizamos el fetch y transformamos la respuesta a txt  
    
});