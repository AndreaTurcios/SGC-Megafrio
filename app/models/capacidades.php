<?php

class Capacidad extends Validator{

    //Se declaran atributos
    private $id = null;
    private $capacidad = null;

    //Asigna valores a los atributos
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setCapacidad($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 50)) {
            $this->capacidad = $value;
            return true;
        } else {
            return false;
        }
    }

     //Se obtiene los valores de los atributos
     public function getId()
     {
         return $this->id;
     }
 
     public function getCapacidad()
     {
         return $this->capacidad;
     }

     public function searchRows($value)
    {
        $sql = 'SELECT id_capacidad, capacidad
                FROM capacidad
                WHERE capacidad ILIKE ?
                ORDER BY capacidad';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

     public function createRow()
    {
        $sql = 'INSERT INTO capacidad(capacidad)
                VALUES(?)';
        $params = array($this->capacidad);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_capacidad, capacidad
                FROM capacidad
                ORDER BY capacidad';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_capacidad, capacidad
                FROM capacidad
                WHERE id_capacidad = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE capacidad
                SET capacidad= ?
                WHERE id_capacidad = ?';
        $params = array($this->capacidad,$this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM capacidad
                WHERE id_capacidad = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
 
}
