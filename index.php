<?php
/**
 * se insertan en estas variables los campos introducidos en el formulario
 */
$nombre_nuevo = filter_input(INPUT_POST, 'nombre_nuevo'); //el campo de nombre 
$telefono_nuevo = filter_input(INPUT_POST, 'telefono_nuevo'); //el campo de telefono

session_start(['cookie_lifetime' => 120]);
/* if( isset( $_SESSION['counter'] ) ) {
  $_SESSION['counter'] += 1;
  }else {
  $_SESSION['counter'] = 1;
  }

  $msg = "You have visited this page ".  $_SESSION['counter'];
  $msg .= " times in this session."; */
$agenda = $_SESSION['agenda'];

// si el nombre esta vacio,mostrar advertencia
if (isset($nombre_nuevo) && strlen($nombre_nuevo) == 0) {
    echo '<div class="warning">';
    echo '  El nombre no puede estar vacío.';
    echo '</div>';
}

$existe = false; //ponemos false para que compare con los datos de la agenda
/**
 * for para mostrar los contactos de la agenda que hayan registros
 */
for ($i = 0; $i < count($_POST['nombre']); $i++) {

    $nombre = $_POST["nombre"][$i];
    $telefono = $_POST["telefono"][$i];

    if ($nombre == $nombre_nuevo) {
        //mismo nombre
        $existe = true;
        if (strlen($telefono_nuevo) == 0) {
            $nombre = null;
            $telefono = null;
        } else {
            $telefono = $telefono_nuevo;
        }
    }
    if ($nombre == null) {
        
    } else {
        agregar_agenda($nombre, $telefono);
    }
}
if ($existe) {      //si existe el nombre
} else {    //si no existe el nombre o existe es false
    if (strlen($nombre_nuevo) > 0) { //comproba longitud de nombres que es string
        agregar_agenda($nombre_nuevo, $telefono_nuevo); //añade el nombre,el telefono en la agenda
    }
}

/**
 * funcion para agregar el nombre y telefono en la agenda
 * @param type $nombre nombre 
 * @param type $telefono
 */
function agregar_agenda($nombre, $telefono) {
    echo '<div id="datos">';            //inicia div 
    echo '<td><p>' . $nombre . '</p></td>';
    echo '<td><p>' . $telefono . '</p></td>';
    //los campos son ocultos en el formulario
    echo '    <input name="nombre[]" type="hidden" readonly value="' . $nombre . '">';
    echo '    <input name="telefono[]" type="hidden" readonly value="' . $telefono . '">';
    echo '</div>';          //cierra el div
}

//echo ($msg);
?>

<html>
    <head>
        <title>Agenda</title> <!-- titulo de la pagina -->
        <!-- estilos para el formulario -->
        <style>

            form {
                width:30%;
                padding:10px;
                border: 3px solid #CCC;
                margin: 0 auto;
                border-radius: 10%;
                background-color: lightgray;
            }

            h2 {
                text-align: center;
            }
            p {
                font-size: 1.5rem;
            }

            #menu {
                text-align: center;
            }

            #menu label {
                width: 30%;
                display: block;
                float: left;
                margin: 5px 0 5px 45px;
                font-size: 1.2rem;
            }

            #menu input {
                padding: 5px;
                margin: 4px 0x;
                font-size: 1rem;
                margin: 0 0 20px -70px;
            }

            #menu input[type=submit] {
                display: block;
                width: 30%;
                margin: 2em auto;
            }

            #agenda{
                display: inline;
                width: 100%;
            }

            #agenda .titulos {
                display: flex;
                width: 100%;
                text-align: center;
            }

            #agenda div:first-child input {
                margin: 0 1em;
                border: 1px;
                font-weight: bold;
                width: 100%;
                text-align: center;
                display: flex;
                background: none;
            }

            #datos {
                width: 100%;
                text-align: center;
                display: flex;
                background-color: lightgray;
            }

            #datos p {
                font-size: 1.5rem;
                width: 50%;
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
            }

            .warning {
                width: 80%;
                text-align: center;
                background-color: lightgoldenrodyellow;
                border: 1px solid #ea2;
                padding: 4px 2.8em;
            }

            .noborder {
                border: none;
                background-color: lightgrey;
            }

        </style>
    </head>
    <body>
        <!-- empieza  a form para formulario -->
        <form  method="post">
            <h2>AGENDA DE CONTACTOS</h2>
            <div id="menu">
                <label for="formNombre">
                    Nombre:
                </label>
                <input id="formNombre" type="text" name="nombre_nuevo" value="<?= $nombre_nuevo ?>" placeholder="Nombre">

                <br>
                <label for="formTelefono">
                    Teléfono:
                </label>
                <input id="formTelefono" type="text" name="telefono_nuevo" value="<?= $telefono_nuevo ?>" placeholder="(Código de área) Número">
                <input type="submit">
            </div>
            <div id="agenda">
                <div class="titulos">
                    <input readonly value="Nombre">
                    <input readonly value="Teléfono">
                </div>
                <hr>

            </div>
        </form>
    </body>

</html>