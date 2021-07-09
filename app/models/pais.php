<?php

class Pais extends Validator{
    
    //Se declaran atributos
    private $id_pais = null;
    private $nombre_pais = null;
    private $codigo_postal = null;

    //Asigna valores a los atributos
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_pais = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombreP($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 50)) {
            $this->nombre_pais = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCodigo($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 15)) {
            $this->codigo_postal = $value;
            return true;
        } else {
            return false;
        }
    }

    //Se obtiene los valores de los atributos
    public function getId()
    {
        return $this->id_pais;
    }

    public function getNombreP()
    {
        return $this->nombre_pais;
    }

    public function getCodigo()
    {
        return $this->codigo_postal;
    }


    public function searchRows($value)
    {
        $sql = 'SELECT id_pais, nombre_pais,codigo_postal
                FROM pais
                WHERE nombre_pais ILIKE ?
                ORDER BY nombre_pais';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO pais(nombre_pais,codigo_postal)
                VALUES(?,?)';
        $params = array($this->nombre_pais,$this->codigo_postal);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_pais, nombre_pais, codigo_postal
                FROM pais
                ORDER BY nombre_pais';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_pais, nombre_pais, codigo_postal
                FROM pais
                WHERE id_pais = ?';
        $params = array($this->id_pais);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE pais
                SET nombre_pais= ?,codigo_postal= ?
                WHERE id_pais = ?';
        $params = array($this->nombre_pais,$this->codigo_postal,$this->id_pais);
        return Database::executeRow($sql, $params);
    }




    
    public function deleteRow()
    {
        $sql = 'DELETE FROM pais
                WHERE id_pais = ?';
        $params = array($this->id_pais);
        return Database::executeRow($sql, $params);
    }
    
}
