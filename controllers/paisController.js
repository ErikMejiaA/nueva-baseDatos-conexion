let formPais = document.querySelector("#myFormPais"); // seleccionamos el formulario
let myHeadersPais = new Headers({ "Content-Type": "application/json" }) //creamos el header que vamos a incluir en el fetch

// creamos un evento al boto de form de Departamento 
document.querySelector('#btnPais').addEventListener('click', async (e) => {
    
    e.preventDefault(); //prevenimos el comportamiento por defecto del formulario al oprimir el botton
    let data = Object.fromEntries(new FormData(formPais).entries()); //obtenemos los datos del form
    let config = { // creamos la configuaracion que se va a pasar al fetch
        method : "POST",
        headers : myHeadersPais,
        body : JSON.stringify(data)             
    };
    let respuesta = await (await fetch("scripts/Paises/insertPais.php", config)).text(); //realizamos el fetch y transformamos la respuesta a txt  
});