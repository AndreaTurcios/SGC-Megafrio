<?php 

class EmpleadosSinAcc extends Validator{
    private $id = null;
    private $nombreempleado = null;
    private $apellidoempleado = null;
    private $telefonoempleado = null;
    private $idtipoempleado = null;
    private $estado = null;
    private $acceso = null;

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
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombreempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidoEmpleado($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
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

    public function setIDTipoEmpleado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idtipoempleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setAcceso($value)
    {
        if ($this->validateBoolean($value)) {
            $this->acceso = $value;
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
    public function getEstado()
    {
        return $this->estado;
    }
    public function getAcceso()
    {
        return $this->acceso;
    }

    public function createRowSinAcc()
    {   
        $acceso = 'false';
        $sql = 'INSERT INTO empleado (nombre_emp,apellido_emp,telefono_emp,estado,id_tipo_emp, acceso)
        VALUES (? ,?, ?, ?, ?, ?)';
        $params = array($this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->estado,$this->idtipoempleado, $acceso);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT em.id_empleado, em.nombre_emp,em.apellido_emp,em.telefono_emp,em.estado,od.tipoemp
        FROM empleado em 
        INNER JOIN tipoempleado od on em.id_tipo_emp = od.id_tipo_emp WHERE acceso = false
        ORDER BY nombre_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_empleado, nombre_emp,apellido_emp,telefono_emp,estado,tipoemp, id_tipo_emp
                FROM empleado 
                INNER JOIN tipoempleado USING(id_tipo_emp)
                WHERE id_empleado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    { 
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $sql = 'UPDATE empleado 
                SET nombre_emp=?,apellido_emp=?,telefono_emp=?,estado=?,id_tipo_emp=?
                WHERE id_empleado = ?';
       //$params = array($this->nombreusuario, $this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->claveempleado,$this->estado,$this->idtipoempleado);
       $params = array($this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->estado,$this->idtipoempleado, $this->id);
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