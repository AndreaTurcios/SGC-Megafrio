<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class tipoequipo extends Validator{
    // Declaración de atributos (propiedades).
    private $id_tipo_equipo=null;
    private $tipo_equipo = null;

    
    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoEquipo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->tipo_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id_tipo_equipo;
    }

    public function getTipoEquipo()
    {
        return $this->tipo_equipo;
    }

    public function readAll()
    {
        $sql = 'SELECT id_tipo_equipo, tipo_equipo
                FROM tipoequipo
                ORDER BY id_tipo_equipo asc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readTipo()
    {
        $sql = 'SELECT id_tipo_equipo, tipo_equipo
        FROM tipoequipo
        WHERE id_tipo_equipo = ?
        ORDER BY id_tipo_equipo';
        $params = array($this->id_tipo_equipo);
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO tipoequipo(tipo_equipo)
        VALUES (?)';
        $params = array($this->tipo_equipo);
        return Database::executeRow($sql, $params);
    }
}
