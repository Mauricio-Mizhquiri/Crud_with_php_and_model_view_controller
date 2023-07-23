<?php
define("urlsite", "https://localhost/crudTrabajo/");
$conn = new mysqli('localhost', "root", "", "crud");
if ($conn->connect_error) {
    die('Error de conexión ' . $conn->connect_error);
}

//comienza la parte de AJAX
$tabla = "";
$query = "SELECT * FROM usuarios ORDER BY id";

if (isset($_POST['usuarios'])) {
    $q = $conn->real_escape_string($_POST['usuarios']);
    $query = "SELECT * FROM usuarios WHERE 
		nombre LIKE '%" . $q . "%' OR
		direccion LIKE '%" . $q . "%' OR
		telefono LIKE '%" . $q . "%' OR
		email LIKE '%" . $q . "%'";
}

$buscarUsuarios = $conn->query($query);
if ($buscarUsuarios->num_rows > 0) {
    $tabla .=
        '<table class="table">
		<tr class="bg-primary">
			<td>Nombre</td>
			<td>Dirección</td>
			<td>Telefono</td>
			<td>Email</td>
			<td>Acción</td>
		</tr>';

    while ($filaUsuarios = $buscarUsuarios->fetch_assoc()) {
        $tabla .= '<tr>
        <td>' . $filaUsuarios['nombre'] . '</td>
        <td>' . $filaUsuarios['direccion'] . '</td>
        <td>' . $filaUsuarios['telefono'] . '</td>
        <td>' . $filaUsuarios['email'] . '</td>
        <td>
            <a class="btn btn-primary btn-sm" href="index.php?m=editar&id=' . $filaUsuarios['id'] . '">Editar</a>
            <a class="btn btn-danger btn-sm" href="index.php?m=eliminar&id=' . $filaUsuarios['id'] . '"
                onclick="return confirm(\'¿Está seguro?\');">Eliminar</a>
        </td>
    </tr>';
    
    }

    $tabla .= '</table>';
} else {
    $tabla = "No se encontraron coincidencias con sus criterios de búsqueda.";
}


echo $tabla;
?>