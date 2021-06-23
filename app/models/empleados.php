<?php

class Empleados extends Validator{
    
    private $id = null;
    private $nombreempleado = null;
    private $apellidoempleado = null;
    private $telefonoempleado = null;
    private $direccionempleado = null;
    private $correoempleado = null;
    private $estadoempleado = null;
    private $usuario = null;
    private $clave = null;
    private $idtipoempleado = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombreEmpleado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombreempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidoEmpleado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->apellidoempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefonoEmpleado($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefonoempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccionEmpleado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->direccionempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreoEmpleado($value)
    {
        if ($this->validateEmail($value)) {
            $this->correoempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoEmpleado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estadoempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }
    
    public function setClave($value)
    {
        if ($this->validatePassword($value, 1, 50)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIDTipoEmpleado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idtipoempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombreEmpleado()
    {
        return $this->nombreempleado;
    }

    public function getApellidoEmpleado()
    {
        return $this->apellidoempleado;
    }

    public function getTelefonoEmpleado()
    {
        return $this->telefonoempleado;
    }

    public function getDireccionEmpleado()
    {
        return $this->direccionempleado;
    }

    public function getCorreoEmpleado()
    {
        return $this->correoempleado;
    }

    public function getEstadoEmpleado()
    {
        return $this->estadoempleado;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getIDTipoEmpleado()
    {
        return $this->idtipoempleado;
    }

    public function searchRows($value)
    {
        $sql = 'SELECT idempleado, nombreempleado,apellidoempleado,telefonoempleado,direccionempleado,correoempleado,estadoempleado,usuario,tipoempleado
                FROM empleado 
                INNER JOIN tipoempleado USING (idtipoempleado)
                WHERE nombreempleado ILIKE ? OR apellidoempleado ILIKE ? 
                ORDER BY nombreempleado';
        $params = array("%$value%","%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO empleado (nombreempleado,apellidoempleado,telefonoempleado,direccionempleado,correoempleado,estadoempleado,usuario,clave,idtipoempleado)
        VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->direccionempleado,$this->correoempleado,$this->estadoempleado,$this->usuario, $hash,$this->idtipoempleado);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT idempleado,nombreempleado,apellidoempleado,telefonoempleado,direccionempleado,correoempleado,estadoempleado,usuario,tipoempleado
                FROM empleado 
				INNER JOIN tipoempleado USING (idtipoempleado)
                ORDER BY idempleado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT idempleado,nombreempleado,apellidoempleado,telefonoempleado,direccionempleado,correoempleado,estadoempleado,usuario,clave,idtipoempleado
                FROM empleado 
                WHERE idempleado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    { $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE empleado 
                SET nombreempleado=?,apellidoempleado=?,telefonoempleado=?,direccionempleado=?,correoempleado=?,estadoempleado=?,usuario=?,clave=?,idtipoempleado=?
                WHERE idempleado = ?';
        $params = array($this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->direccionempleado,$this->correoempleado,$this->estadoempleado,$this->usuario,$hash,$this->idtipoempleado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM empleado
                WHERE idempleado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}