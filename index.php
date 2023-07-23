<?php
    //invocamos a la configuración de php
    //require_once("config.php");
    
    //invocamos a index de controlador
    require_once("controlador/controlador.php");


    if (isset($_GET['m'])):
        if(method_exists("modeloControlador", $_GET['m'])):
            modeloControlador::{$_GET['m']}();
        endif;
    else:
        //llamamos al método inicio que se encuentra en la clase modeloControlador del index de controlador
        modeloControlador::inicio();
    endif;
?> 