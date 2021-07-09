<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class tipoEmpleado extends Validator{
    // Declaración de atributos (propiedades).
    private $id=null;
    private $tipoempleado = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setTipoEmpleado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->tipoempleado = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getId()
    {
        return $this->id;
    }

    public function getTipoEmpleado()
    {
        return $this->tipoempleado;
    }
    public function var()
    {
        $sql = '';
        $params = null;
     return Database::getRows($sql, $params); 
    }

     /*
    *   Método para realizar la operación readall
    */

    public function readAll()
    {
        $sql = 'SELECT id_tipo_emp, tipoemp
                FROM tipoempleado';
        $params = null;
        return Database::getRows($sql, $params);
    }


}
