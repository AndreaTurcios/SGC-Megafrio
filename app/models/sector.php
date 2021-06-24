<?php

class Sector extends Validator{
    
    //Se declaran atributos
    private $id_sector = null;
    private $sector = null;

    //Asigna valores a los atributos
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_sector = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoEnt($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 50)) {
            $this->sector = $value;
            return true;
        } else {
            return false;
        }
    }

    //Se obtiene los valores de los atributos
    public function getId()
    {
        return $this->id_sector;
    }

    public function getTipoEnt()
    {
        return $this->sector;
    }


    public function searchRows($value)
    {
        $sql = 'SELECT id_sector, sector
                FROM sector
                WHERE sector ILIKE ?
                ORDER BY sector';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO sector(sector)
                VALUES(?)';
        $params = array($this->sector);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_sector, sector
                FROM sector
                ORDER BY id_sector';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_sector, sector
                FROM sector
                WHERE id_sector = ?';
        $params = array($this->id_sector);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE sector 
                SET sector= ?
                WHERE id_sector = ?';
        $params = array($this->sector,$this->id_sector);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM sector
                WHERE id_sector = ?';
        $params = array($this->id_sector);
        return Database::executeRow($sql, $params);
    }
    
}
