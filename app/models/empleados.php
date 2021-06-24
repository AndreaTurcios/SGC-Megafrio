<?php

class Empleados extends Validator{
    
    private $id = null;
    private $nombreusuario = null;
    private $nombreempleado = null;
    private $apellidoempleado = null;
    private $telefonoempleado = null;
    private $claveempleado = null;
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

    public function setNombreUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombreusuario = $value;
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

    public function setClaveEmpleado($value)
    {
        if ($this->validatePassword($value, 1, 50)) {
            $this->claveempleado = $value;
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

    public function getNombreUsuario()
    {
        return $this->nombreusuario;
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

    public function getClaveEmpleado()
    {
        return $this->claveempleado;
    }

    public function getIDTipoEmpleado()
    {
        return $this->idtipoempleado;
    }

    public function searchRows($value)
    {
        $sql = 'SELECT id_empleado, nombre_usuario, nombre_emp,apellido_emp,telefono_emp,id_tipo_emp
                FROM empleado 
                INNER JOIN tipoempleado USING (idtipoempleado)
                WHERE nombre_emp ILIKE ? OR apellido_emp ILIKE ? 
                ORDER BY apellido_emp';
        $params = array("%$value%","%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->claveempleado, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO empleado (nombre_usuario, nombre_emp,apellido_emp,telefono_emp,clave_emp,id_tipo_emp)
        VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombreusuario, $this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->claveempleado,$this->idtipoempleado);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_empleado, nombre_usuario, nombre_emp,apellido_emp,telefono_emp,id_tipo_emp
                FROM empleado  
				INNER JOIN tipoempleado USING (id_tipo_emp)
                ORDER BY id_empleado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_empleado, nombre_usuario, nombre_emp,apellido_emp,telefono_emp,id_tipo_emp
                FROM empleado 
                WHERE id_empleado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    { $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE empleado 
                SET nombre_usuario=?,nombre_emp=?,apellido_emp=?,telefono_emp=?,clave_emp=?,id_tipo_emp=?
                WHERE idempleado = ?';
        $params = array($this->nombreusuario, $this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado, $this->claveempleado,$this->claveempleado,$this->idtipoempleado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM empleado
                WHERE id_empleado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}