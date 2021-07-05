<?php

class Clientes extends Validator
{   

    //Variables de Cliente

    private $id_cliente = null;
    private $nombre_cli = null;
    private $telefono_cli = null;
    private $dui_cli = null;
    private $nit_cli = null;
    private $direccion_cli = null;
    private $correo_cli = null;
    private $id_estado_pago = null;

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value){
        if ($this->validateAlphabetic($value, 1 , 140)) {
            $this->nombre_cli= $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value){
        if ($this->validatePhone($value)) {
            $this->telefono_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDui($value){
        if ($this->validateDUI($value)) {
            $this->dui_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNIT($value){
        if ($this->validateNIT($value)) {
            $this->nit_cli = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setDireccion($value){
        if ($this->validateAlphanumeric($value, 1, 200)) {
            $this->direccion_cli= $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value){
        if ($this->validateEmail($value)) {
            $this->correo_cli = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_pago = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId(){
        return $this->id_cliente;
    }

    public function getNombre(){
        return $this->nombre_cli;
    }

    public function getTelefono(){
        return $this->telefono_cli;
    }

    public function getDui(){
        return $this->dui_cli;
    }

    public function getNit(){
        return $this->nit_cli;
    }

    public function getDireccion(){
        return $this->direccion_cli;
    }

    public function getCorreo(){
        return $this->correo_cli;
    }

    public function getEstado(){
        return $this->id_estado_pago;
    }

    public function searchRows($value)
    {
        $sql = 'SELECT id_cliente, nombre_cli, telefono_cli, dui_cli, nit_cli, direccion_cli, correo_cli, estado_pago  
        FROM clientes INNER JOIN estado_pago using(id_estado_pago) WHERE nombre_cli ILIKE ?';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_cliente, nombre_cli, telefono_cli, dui_cli, nit_cli, direccion_cli, correo_cli, estado_pago  
        FROM clientes INNER JOIN estado_pago using(id_estado_pago)  ORDER BY id_cliente ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readEstados()
    {
        $sql = 'SELECT id_estado_pago, estado_pago FROM estado_pago';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE clientes 
        SET nombre_cli = ?, telefono_cli = ?, dui_cli = ?, nit_cli = ?, 
        direccion_cli = ?, correo_cli = ?, id_estado_pago = ? WHERE id_cliente = ?';
        $params = array($this->nombre_cli,$this->telefono_cli, $this->dui_cli, $this->nit_cli, $this->direccion_cli, $this->correo_cli, $this->id_estado_pago, $this->id_cliente);
        return Database::executeRow($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO clientes(nombre_cli, telefono_cli, dui_cli, nit_cli, direccion_cli, correo_cli, id_estado_pago) 
        values (?,?,?,?,?,?,?)';
        $params = array($this->nombre_cli,$this->telefono_cli, $this->dui_cli, $this->nit_cli, $this->direccion_cli, $this->correo_cli, $this->id_estado_pago);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id_cliente);
        return Database::executeRow($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_cliente, nombre_cli, telefono_cli, dui_cli, nit_cli, direccion_cli, correo_cli, id_estado_pago  
        FROM clientes 
        WHERE id_cliente = ?';
        $params = array($this->id_cliente);
        return Database::executeRow($sql, $params);
    }






    
}