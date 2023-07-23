<?php
    class Usuario{
        public $id;
        public $nombre;
        public $direccion;
        public $telefono;
        public $email;
        public function __construct($id, $nombre, $direccion, $telefono, $email) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->email = $email;
        }
        //Getters
        public function id() {
            return $this->id;
        }
        public function setId($id) {
            $this->nombre = $id;
        }
        
        public function getNombre() {
            return $this->nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        
        public function getDireccion() {
            return $this->direccion;
        }
        
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
    
        public function getTelefono(){
            return $this->telefono;
        }
    
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }

        public function __toString() {
            return "Usuario [id=$this->id, nombre=$this->nombre, direccion=$this->direccion, telefono=$this->telefono, email=$this->email]";
        }

    }



?>