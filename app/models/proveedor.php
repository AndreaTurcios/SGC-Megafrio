<?php

class Proveedor extends Validator{
    
    private $id = null;
    private $nombre_compania = null;
    private $telefono_proveedor = null;
    private $direccion_proveedor = null;
    private $id_pais = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombreCompania($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre_compania = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setRepresentante($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->representante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefonoProveedor($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccionProveedor($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->direccion_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombreCompania()
    {
        return $this->nombre_compania;
    }

    public function getRepresentante()
    {
        return $this->representante;
    }

    public function getTelefonoProveedor()
    {
        return $this->telefono_proveedor;
    }

    public function getDireccionProveedor()
    {
        return $this->direccion_proveedor;
    }

    public function searchRows($value)
    {
        $sql = 'SELECT nombrecompania,representante,telefonoproveedor,direccionproveedor
                FROM proveedor 
                WHERE nombrecompania ILIKE ? OR representante ILIKE ? 
                ORDER BY nombrecompania'; 
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO proveedor(nombrecompania,representante,telefonoproveedor,direccionproveedor)
        VALUES (? ,?, ?, ?)';
        $params = array($this->nombre_compania, $this->representante, $this->telefono_proveedor,$this->direccion_proveedor);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT idproveedor,nombrecompania,representante,telefonoproveedor,direccionproveedor
                FROM proveedor 
                ORDER BY idproveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT idproveedor,nombrecompania,representante,telefonoproveedor,direccionproveedor
                FROM proveedor 
                WHERE idproveedor = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE proveedor 
                SET nombrecompania= ?,representante= ?,telefonoproveedor= ?,direccionproveedor = ?
                WHERE idproveedor = ?';
        $params = array($this->nombre_compania, $this->representante, $this->telefono_proveedor, $this->direccion_proveedor, $this->id);
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
