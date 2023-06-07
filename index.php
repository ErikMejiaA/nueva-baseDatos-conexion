<?php 
    include_once ('app.php');

    // Datos del Pais
    use Models\Paises;
    $objPaises = new Paises;
    //var_dump(($objPais -> loadAllData()));
    $datoPaises = $objPaises -> loadAllData();

    echo "<br/>";
    echo "DATOS DEL PAIS";
    echo "<pre>";
    print_r($datoPaises);
    echo "</pre>";

    // Datos del Departamento
    use Models\Departamentos;
    $objDep = new Departamentos;
    //var_dump($objDep -> loadAllData());
    $datoDep = $objDep -> loadAllData();

    echo "DATOS DEL DEPARTAMENTO";
    echo "<pre>";
    print_r($datoDep);
    echo "</pre>";

    // Datos de la region
    use Models\Regiones;
    $objReg = new Regiones;
    //var_dump($objReg -> loadAllData());
    $datoReg = $objReg -> loadAllData();

    echo "DATOS DE LA REGION";
    echo "<pre>";
    print_r($datoReg);
    echo "</pre>";

    // Datos del cliete
    use Models\Clientes;
    $objClientes = new Clientes();
    //var_dump($objCliente -> loadAllData());
    $datoClientes = $objClientes -> loadAllData();

    echo "DATOS DEL CLIENTE";
    echo "<pre>";
    print_r($datoClientes);
    echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="controllers/paisController.js" type="text/javascript" defer></script>
    <script src="controllers/depController.js" type="text/javascript" defer></script>
    <script src="controllers/regController.js" type="text/javascript" defer></script>
    <script src="controllers/clienteController.js" type="text/javascript" defer></script>
    <title>MY TIENDA</title>
</head>
<body>

    <header></header>
    <nav></nav>

    <main>
        <div id="Pais">

            <form id="myFormPais">
                <label for="nombrePais">Ingrese un Pais:</label>
                <input type="text" name="nombrePais" id="nombrePais"><br>
                <button type="submit" id="btnPais">Enviar</button>
            </form>

        </div>
        <br>
        
        <div id="Departamento">
                
            <form id="myFormDepartamento">
                <select name="idPais" id="idPais">
                    <option selected>Selecione un pais</option>
                    <?php foreach($datoPaises as $itemPais) { ?>

                        <option value="<?php echo $itemPais['idPais']; ?>"><?php echo $itemPais['nombrePais']; ?></option>

                    <?php } ?>
                </select><br>
                <label for="nombreDep">Ingrese el Departamento:</label>
                <input type="text" name="nombreDep" id="nombreDep"><br>
                <button type="submit" id="btnDep">Enviar</button>
            </form>

        </div>
        <br>

        <div id="Region">
                
            <form id="myFormRegion">
                <select name="idDep" id="idDep">
                    <option selected>Selecione un Departamento</option>
                    <?php foreach($datoDep as $itemDep) { ?>

                        <option value="<?php echo $itemDep['idDep']; ?>"><?php echo $itemDep['nombreDep']; ?></option>

                    <?php } ?>
                </select><br>
                <label for="nombreReg">Ingrese la Region:</label>
                <input type="text" name="nombreReg" id="nombreReg"><br>
                <button type="submit" id="btnReg">Enviar</button>
            </form>

        </div>
        <br>

        <div id="Cliente">
                
            <form id="myFormCliente">
                <select name="idReg" id="idReg">
                    <option selected>Selecione una Region</option>
                    <?php foreach($datoReg as $itemReg) { ?>

                        <option value="<?php echo $itemReg['idReg']; ?>"><?php echo $itemReg['nombreReg']; ?></option>

                    <?php } ?>
                </select><br>
                <label for="primerNombre">Ingrese su Primer Nombre:</label>
                <input type="text" name="primerNombre" id="primerNombre"><br>

                <label for="segundoNombre">Ingrese su Segundo Nombre:</label>
                <input type="text" name="segundoNombre" id="segundoNombre"><br>

                <label for="primerApellido">Ingrese su Primer Apellido:</label>
                <input type="text" name="primerApellido" id="primerApellido"><br>

                <label for="segundoApellido">Ingrese su Segundo Apellido:</label>
                <input type="text" name="segundoApellido" id="segundoApellido"><br>

                <label for="emailCliente">Ingrese su Email:</label>
                <input type="email" name="emailCliente" id="emailCliente"><br>

                <label for="fechaNacimiento">Ingrese su Fecha de Nacimiento:</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento"><br>

                <button type="submit" id="btnCliente">Enviar</button>
            </form>

        </div>
        
    </main>

    <footer></footer>

</body>
</html>