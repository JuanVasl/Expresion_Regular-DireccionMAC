<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direccion MAC - JuanVas</title>
    <!-- CDN Para la Alerta -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<!-- Estilos CSS -->    
<style>
    body{
        margin: 0;
        padding: 0;
        background-color: #FEF200;
    }
    .contenedor{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    form{
        background-color: #ececec;
        width: 30rem;
        height: 140px;
        border: 2px solid #449bff;
        outline: 1px solid #82cdff;
        padding: 20px 0px 5px 20px;
    }
    
    .mac{
        width: 300px;
        margin-right: 40px;
        font-weight: bold;
    }
    .aceptar{
        width: 100px;
    }

    .umg{
        width: 450px;
        font-weight: bold;
    }

    .cerrar{
        width: 100px;
        margin-top: 10px;
        margin-left: 350px;
        background: rgb(212,240,240);
    background: linear-gradient(180deg, rgba(212,240,240,1) 44%, rgba(138,199,204,1) 93%);
        border: 1px solid #4A9EC3;
        border-radius: 5px;
    }
</style>
<body>
<?php

    // EXPRESIONES REGULARES
    $regex = "/^[1][C][-][6][F][-][6][5][-][3][8][-][B][5][-][2][0]$/"; //Valida unica expresion permitida
    if (isset($_POST['btnEnviar'])) {
    if (preg_match($regex, $_POST['mac'])) {
        $resultado = "UNIVERSIDAD MARIANO GÁLVEZ DE GUATEMALA";
        $er = $_POST['mac']; //regresa el valor al input para que no se borre al momento de hacer submit
    } else {
        // Alerta de Error
        $alert = "
        <script>
        Swal.fire(
            'Compruebe que la dirección MAC sea la correcta',
            'Ejemplo: 1C-6F-65-38-B5-20 <br><br>Recuerda que la direccion MAC <br>*Debe de estar seraprada por guiones (-)<br>*Debe estar en Mayuscualas <br>*Los caracteres permitidos son entre 0-9 y A-F <br>*Esta conformada por 17 caracteres incluyendo el guion',
            'error'
          )
        </script>
        ";
    }
    }

    //Alerta de boton sin funcionar
    if (isset($_POST['btnCerrar'])){
        $alert = "
        <script>
        Swal.fire(
            'Opción no Disponible :(',
            'Lo sentimos, aun estamos trabajando en ello...',
            'warning'
          )
        </script>
        ";
    }

?>
    <!--Formulario-->
    <div class="contenedor">
        <form action="" method="POST">
            <label for="fname">MAC address</label><br>
            <!-- El pattern solo permite el formato de Direccion MAC -->
            <input type="text" value="<?php if(isset($resultado)) {echo $er;} ?>" name="mac" class="mac" placeholder="Ejemplo: 1C-6F-65-38-B5-20" pattern="([0-9a-fA-F]{2}[-]){5}([0-9a-fA-F]{2})" maxlength="17" >
            <button class="aceptar" type="submit" name="btnEnviar">Lookup</button>

            <br><br>

            <label for="fname">Manufacturer</label><br>
            <input type="text" value="<?php if(isset($resultado)) {echo '&nbsp;'.$resultado.'';} ?>" class="umg" readonly="readonly">

            <?php if(isset($alert)) {echo '&nbsp;'.$alert.'';} ?>

            <button class="cerrar" name="btnCerrar">Close</button>
        </form>    
    </div>
</body>
</html>

<!-- 
    Hoja de Trabajo #6 Automatas y lenguajes Formales
    Juan Luis Vásquez López (JuanVas)
    0909-20-6391
    28 de Agosto del 2022
-->
