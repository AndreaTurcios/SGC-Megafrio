<?php

class Proveedor extends Validator{
    
    private $id_proveedor = null;
    private $nombre_compania = null;
    private $telefono_pro = null;
    private $direccion_pro = null;
    private $id_pais = null;
    private $info_tributaria = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_proveedor = $value;
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

    public function setTelefonoProveedor($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono_pro = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccionProveedor($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->direccion_pro = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdPais($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->id_pais = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setInfoTributaria($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->info_tributaria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id_proveedor;
    }

    public function getNombreCompania()
    {
        return $this->nombre_compania;
    }

    public function getTelefonoProveedor()
    {
        return $this->telefono_pro;
    }

    public function getDireccionProveedor()
    {
        return $this->direccion_pro;
    }

    public function getIdPais()
    {
        return $this->id_pais;
    }

    public function getInfoTributaria()
    {
        return $this->info_tributaria;
    }


    public function searchRows($value)
    {
        $sql = 'SELECT pro.id_proveedor, pro.nombre_compania, pro.telefono_pro, pro.direccion_pro, pa.nombre_pais, pa.codigo_postal, pro.info_tributaria 
        FROM proveedor pro
        INNER JOIN pais pa on pro.id_pais = pa.id_pais
        WHERE pro.nombre_compania ILIKE ? OR pa.nombre_pais ILIKE ? OR pro.telefono_pro ILIKE ?
        ORDER BY nombre_compania'; 
        $params = array("%$value%","%$value%","%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO proveedor(nombre_compania, telefono_pro, direccion_pro, id_pais,info_tributaria)
        VALUES (? ,?, ?, ?, ?)';
        $params = array($this->nombre_compania,$this->telefono_pro,$this->direccion_pro,$this->id_pais,$this->info_tributaria);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT pro.id_proveedor, pro.nombre_compania, pro.telefono_pro, pro.direccion_pro, pa.nombre_pais, pa.codigo_postal, pro.info_tributaria 
        FROM proveedor pro
        INNER JOIN pais pa on pro.id_pais = pa.id_pais
        ORDER BY id_proveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_proveedor, nombre_compania, telefono_pro, direccion_pro, id_pais, info_tributaria
                FROM proveedor 
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE proveedor 
                SET nombre_compania= ?,telefono_pro= ?,direccion_pro= ?,id_pais = ?, info_tributaria = ? 
                WHERE id_proveedor = ?';
        $params = array($this->nombre_compania,$this->telefono_pro,$this->direccion_pro,$this->id_pais,$this->info_tributaria,$this->id_proveedor);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::executeRow($sql, $params);
    }
    
}
