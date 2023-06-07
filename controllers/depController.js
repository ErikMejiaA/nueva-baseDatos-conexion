let formDepartamento = document.querySelector("#myFormDepartamento"); // seleccionamos el form de departamento
let myHeadersDep = new Headers({ "Content-Type": "application/json" }) //creamos el header que vamos a incluir en el fetch

// creamos un evento al boto de form de Departamento 
document.querySelector('#btnDep').addEventListener('click', async (e) => {

    e.preventDefault(); //prevenimos el comportamiento por defecto del formulario al oprimir el botton 
    let data = Object.fromEntries(new FormData(formDepartamento).entries()); //obtenemos los datos del form
    console.log(data)
    let config = { // creamos la configuaracion que se va a pasar al fetch
        method : "POST",
        headers : myHeadersDep,
        body : JSON.stringify(data)             
    };

    let respuesta = await (await fetch("scripts/Departamentos/insertDep.php", config)).text(); //realizamos el fetch y transformamos la respuesta a txt  
    
});