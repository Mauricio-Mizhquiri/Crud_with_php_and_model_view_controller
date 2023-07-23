<?php
require_once("layout/header.php");
?>

<div class="container my-5">
    <h1 class="text_center">Editar usuario</h1>
    <br>
    <br>
    <br>
    <form action="" method="get">
        <?php
        foreach ($dato as $key => $value):
            foreach ($value as $v):
                ?>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombre" id = "nombre" value="<?php echo $v['nombre'] ?>" onkeyup="validarInput('nombre','errorMensaje')" required>
                        <span id="errorMensaje" style="color: red;"></span>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Dirección</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $v['direccion'] ?>" onkeyup="validarInput('direccion','errorMensajedireccion')" required>
                        <span id="errorMensajedireccion" style="color: red;"></span>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Teléfono</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $v['telefono'] ?>" onkeyup="validarNumeros('telefono','errorMensajeNumeros')" required>
                        <span id="errorMensajeNumeros" style="color: red;"></span>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $v['email'] ?>" onkeyup="validarEmail('email','errorMensajeEmail')" required>
                        <span id="errorMensajeEmail" style="color: red;"></span>
                    </div>
                </div>

                <br>
                <br><br>
                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <input type="hidden" value="<?php echo $v['id'] ?>" name = "id">
                        <input type="submit" class="btn btn-primary" value="Actualizar" name="btn">
                        <input type="hidden" name="m" value="actualizar">
                    </div>
                    <div class="col-sm-3 d-grid ">
                        <input type="button" class="btn btn-outline-primary" value="Cancelar" name="btn"
                            onclick="history.go(-1);">
                    </div>
                </div>
                <?php
            endforeach;
        endforeach;
        ?>
    </form>
</div>
