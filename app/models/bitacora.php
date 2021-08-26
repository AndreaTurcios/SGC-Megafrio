<?php

class Bitacora extends Validator
{    
    private $id_bitacora = null;
    private $id_cliente = null;
    private $id_empleado = null;
    private $id_equipo = null;
    private $fecha = null;
    private $hora = null;
    private $id_tipo_servicio = null;
    private $id_estado_equipo = null;
    private $id_tipo_pago = null;
    private $archivo = null;
    private $ubicacion = null;
    private $direccion = '../../resources/docs/bitacora/';

    public function setId($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_bitacora = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmpleado($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_empleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEquipo($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value){
        if ($this->validateDate($value)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setHora($value){
        if ($this->validateString($value,1,5)) {
            $this->hora = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoServicio($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_servicio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoEquipo($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoPago($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_pago = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUbicacion($value){
        if ($this->validateAlphanumeric($value,1,300)) {
            $this->ubicacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setArchivo($file)
    {
        if ($this->validatePDFFile($file)) {
            $this->archivo = $this->getFileName();
            return true;
        } else {
            return false;
        }
    }

    // GETTERS

    public function getId(){
        return $this->id_bitacora;
    }

    public function getCliente(){
        return $this->id_cliente;
    }

    public function getEmpleado(){
        return $this->id_empleado;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getHora(){
        return $this->hora;
    }

    public function getTipoServicio(){
        return $this->id_tipo_servicio;
    }

    public function getEquipo(){
        return $this->id_equipo;
    }

    public function getEstadoEquipo(){
        return $this->id_estado_equipo;
    }

    public function getTipoPago(){
        return $this->id_tipo_pago;
    }

    public function getArchivo(){
        return $this->archivo;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    //Operaciones

    public function searchRows($value)
    {   
        $sql = 'SELECT id_bitacora, nombre_cli, nombre_emp, fecha, hora, tiposervicio,
        nombre_equipo, estado_equipo, tipo_pago, archivo, ubicacion from bitacora
        INNER JOIN equipo using(id_equipo) 
        INNER JOIN estado_equipo using(id_estado_equipo)
        INNER JOIN clientes using(id_cliente)
        INNER JOIN empleado using(id_empleado)
        INNER JOIN tiposervicio using(id_tipo_servicio)
        INNER JOIN tipo_pago using(id_tipo_pago) WHERE fecha = ? order by id_bitacora;';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_bitacora, nombre_cli, nombre_emp, fecha, hora, tiposervicio,
        nombre_equipo, estado_equipo, tipo_pago, archivo, ubicacion from bitacora
        INNER JOIN equipo using(id_equipo) 
        INNER JOIN estado_equipo using(id_estado_equipo)
        INNER JOIN clientes using(id_cliente)
        INNER JOIN empleado using(id_empleado)
        INNER JOIN tiposervicio using(id_tipo_servicio)
        INNER JOIN tipo_pago using(id_tipo_pago)  ORDER BY id_bitacora ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readClientes()
    {
        $sql = 'SELECT id_cliente, nombre_cli FROM clientes';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readEmpleados()
    {
        $sql = 'SELECT id_empleado, nombre_emp FROM empleado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readEquipo()
    {
        $sql = 'SELECT id_equipo, nombre_equipo FROM equipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readEstadoEquipo()
    {
        $sql = 'SELECT id_estado_equipo, estado_equipo FROM estado_equipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readTipoServicio()
    {
        $sql = 'SELECT id_tipo_servicio, tiposervicio FROM tiposervicio';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readTipoPago()
    {
        $sql = 'SELECT id_tipo_pago, tipo_pago FROM tipo_pago';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO bitacora(id_cliente, id_empleado, id_equipo, fecha, 
        hora, id_tipo_servicio, id_tipo_pago, id_estado_equipo, archivo, ubicacion) VALUES (?,?,?,?,?,?,?,?,?,?)';
        $params = array($this->id_cliente,$this->id_empleado,$this->id_equipo,$this->fecha,$this->hora, $this->id_tipo_servicio,$this->id_tipo_pago,$this->id_estado_equipo,$this->archivo,$this->ubicacion);
        return Database::executeRow($sql, $params);
    }

    public function updateRow($current_archivo)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->archivo) ? $this->deleteFile($this->getDireccion(), $current_archivo) : $this->archivo = $current_archivo;

        $sql = 'UPDATE bitacora 
        SET id_cliente = ?, id_empleado = ?, id_equipo = ?, fecha = ?, 
        hora = ?, id_tipo_servicio = ?, id_tipo_pago = ?, id_estado_equipo = ?, archivo = ?, ubicacion = ? WHERE id_bitacora = ?';
        $params = array($this->id_cliente,$this->id_empleado,$this->id_equipo,$this->fecha,$this->hora, $this->id_tipo_servicio,$this->id_tipo_pago,$this->id_estado_equipo,$this->archivo,$this->ubicacion,$this->id_bitacora);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM bitacora
                WHERE id_bitacora = ?';
        $params = array($this->id_bitacora);
        return Database::executeRow($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_bitacora, id_cliente, id_empleado, id_equipo, nombre_cli, nombre_emp, nombre_equipo, fecha, 
        hora, id_tipo_servicio, id_tipo_pago, id_estado_equipo, archivo, ubicacion, tiposervicio  
        FROM bitacora INNER JOIN clientes using(id_cliente)
        INNER JOIN empleado using(id_empleado)
        INNER JOIN equipo using(id_equipo)
		INNER JOIN tiposervicio using(id_tipo_servicio)
        WHERE id_bitacora = ?';
        $params = array($this->id_bitacora);
        return Database::getRow($sql, $params);
    }

    public function readReport()
    {
        $sql = 'SELECT nombre_cli, nombre_emp, fecha, hora, tiposervicio,
        nombre_equipo, estado_equipo, tipo_pago, archivo, ubicacion from bitacora
        INNER JOIN equipo using(id_equipo) 
        INNER JOIN estado_equipo using(id_estado_equipo)
        INNER JOIN clientes using(id_cliente)
        INNER JOIN empleado using(id_empleado)
        INNER JOIN tiposervicio using(id_tipo_servicio)
        INNER JOIN tipo_pago using(id_tipo_pago)  
        WHERE id_bitacora = ?';
         $params = array($this->id_bitacora);
         return Database::getRows($sql, $params);
    }
    
    
}