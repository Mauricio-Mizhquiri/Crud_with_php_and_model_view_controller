<?php
    require_once("layout/header.php");
?>

<div class="container my-5">
    <h2 class="text_center">Ingrese datos de nuevo usuario</h2> <br><br>
    
    <form action="" method = "get">

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class = "form-control" id = "nombre" name = "nombre" onkeyup="validarInput('nombre','errorMensaje')" required>
                <span id="errorMensaje" style="color: red;"></span>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Dirección</label>
            <div class="col-sm-6">
                <input type="text" class = "form-control" name = "direccion"  id = "direccion" onkeyup="validarInput('direccion','errorMensajedireccion')" required>
                <span id="errorMensajedireccion" style="color: red;"></span>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Teléfono</label>
            <div class="col-sm-6">
                <input type="text" class = "form-control" name = "telefono" id = "telefono" onkeyup="validarNumeros('telefono','errorMensajeNumeros')" required>
                <span id="errorMensajeNumeros" style="color: red;"></span>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class = "form-control" name = "email" id = "email" onkeyup="validarEmail('email','errorMensajeEmail')" required>
                <span id="errorMensajeEmail" style="color: red;"></span>
            </div>
        </div>


        <br>
        <br><br>
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <input type="submit" class = "btn btn-primary" value = "Guardar" name = "btn"> 
                <input type="hidden" name = "m" value = "guardar">
            </div>
            <div class="col-sm-3 d-grid ">
                <input type="button" class="btn btn-outline-primary" value="Cancelar" name="btn" onclick="history.go(-1);">
            </div>
        </div>

    </form>

    
    
</div>
