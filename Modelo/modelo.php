<?php

class Modelo
{
    private $Modelo;
    private $db;
    private $datos;
    //constructor
    public function __construct()
    {
        $this->Modelo = array();
        $this->db = new PDO('mysql:host=localhost;dbname=crud', "root", "");
    }

    //método para insertar
    public function insertar($tabla, $data)
    {
        $atributos = get_object_vars($data);
        $columnas = implode(", ", array_keys($atributos));
        $valores = implode("', '", array_values($atributos));
        $consulta = "INSERT INTO $tabla ($columnas) VALUES ('$valores')"; // Solo para fines de depuración
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    //método para mostrar
    public function mostrar($tabla, $condicion)
    {
        $consulta = "select * from " . $tabla . " where " . $condicion . ";";
        $resultado = $this->db->query($consulta);
        while ($filas = $resultado->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[] = $filas;
        }
        return $this->datos;
    }
    //método para actualizar
    public function actualizar($tabla, $data, $condicion)
    {
        $columnas = array();
        foreach ($data as $clave => $valor) {
            $columnas[] = "$clave = '$valor'";
        }
        $columnas = implode(',', $columnas);
        $consulta = "UPDATE $tabla SET $columnas WHERE $condicion";
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }


    //método para eliminar
    public function eliminar($tabla, $condicion)
    {
        $consulta = "delete from " . $tabla . " where " . $condicion;
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }


}