<?php

class Pais extends Validator{
    
    //Se declaran atributos
    private $id_pais = null;
    private $tipoentorno = null;

    //Asigna valores a los atributos
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_ent = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoEnt($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 50)) {
            $this->tipoentorno = $value;
            return true;
        } else {
            return false;
        }
    }

    //Se obtiene los valores de los atributos
    public function getId()
    {
        return $this->id_tipo_ent;
    }

    public function getTipoEnt()
    {
        return $this->tipoentorno;
    }


    public function searchRows($value)
    {
        $sql = 'SELECT id_tipo_ent, tipo_entorno
                FROM tipoentorno
                WHERE tipoentorno ILIKE ?
                ORDER BY marca';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO tipoentorno(marca)
                VALUES(?)';
        $params = array($this->nombre);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_proveedor, nombre_compania, telefono_pro, direccion_pro, id_pais
                FROM proveedor 
                ORDER BY id_proveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_proveedor, nombre_compania, telefono_pro, direccion_pro, id_pais
                FROM proveedor 
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE proveedor 
                SET nombre_compania= ?,telefono_pro= ?,direccion_pro= ?,id_pais = ?
                WHERE idproveedor = ?';
        $params = array($this->nombre_compania,$this->telefono_pro,$this->direccion_pro,$this->id_pais,$this->id_proveedor);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM proveedor
                WHERE idproveedor = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    
}
