<?php
require_once("layout/header.php");


?>

<div class="container my-5">

    <a href="index.php?m=nuevo" class="btn_nuevo btn btn-primary">Nuevo</a>
    <br>
    <section class="inline-form">
        <input type="text" class="input_busqueda form-control" name="busqueda" id="busqueda" placeholder="Buscar">
        <!-- <button class="btn btn-primary btn-sm" type="submit">Buscar</button> -->
    </section>
    <br>
    
    <section id = "tabla_resultado">

    </section>
</div>