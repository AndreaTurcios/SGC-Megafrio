<?php
class Empleados extends Validator{
    
    private $id = null;
    private $nombreusuario = null;
    private $nombreempleado = null;
    private $apellidoempleado = null;
    private $telefonoempleado = null;
    private $claveempleado = null;
    private $idtipoempleado = null;
    private $estado = null;

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

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
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

    public function getEstado()
    {
        return $this->estado;
    }

    public function searchRows($value)
    {
        $sql = 'SELECT em.id_empleado, em.nombre_usuario, em.nombre_emp,em.apellido_emp,em.telefono_emp,em.estado,od.tipoemp 
                FROM empleado em
                INNER JOIN tipoempleado od on em.id_tipo_emp = od.id_tipo_emp
                WHERE em.nombre_emp ILIKE ? OR em.apellido_emp ILIKE ? OR od.tipoemp ILIKE ? OR em.nombre_usuario ILIKE ? OR em.telefono_emp ILIKE ?
                ORDER BY apellido_emp';
        $params = array("%$value%","%$value%","%$value%","%$value%","%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->claveempleado, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO empleado (nombre_usuario, nombre_emp,apellido_emp,telefono_emp,clave_emp,estado,id_tipo_emp)
        VALUES (? ,?, ?, ?, ?, ?, ?)';
        $params = array($this->nombreusuario, $this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$hash,$this->estado,$this->idtipoempleado);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT em.id_empleado, em.nombre_usuario, em.nombre_emp,em.apellido_emp,em.telefono_emp,em.estado,od.tipoemp 
        FROM empleado em
        INNER JOIN tipoempleado od on em.id_tipo_emp = od.id_tipo_emp
        ORDER BY nombre_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_empleado, nombre_usuario, nombre_emp,apellido_emp,telefono_emp,estado,id_tipo_emp
                FROM empleado 
                WHERE id_empleado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    { 
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->claveempleado, PASSWORD_DEFAULT);
        $sql = 'UPDATE empleado 
                SET nombre_usuario=?,nombre_emp=?,apellido_emp=?,telefono_emp=?,estado=?,id_tipo_emp=?
                WHERE id_empleado = ?';
       //$params = array($this->nombreusuario, $this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->claveempleado,$this->estado,$this->idtipoempleado);
       $params = array($this->nombreusuario, $this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado,$this->estado,$this->idtipoempleado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM empleado
                WHERE id_empleado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function checkUser($nombreusuario)
    {
        $sql = 'SELECT id_empleado, id_tipo_emp, estado FROM empleado WHERE nombre_usuario = ?';
        $params = array($nombreusuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_empleado'];
            $this->idtipoempleado = $data['id_tipo_emp'];
            $this->estado = $data['estado'];
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT clave_emp FROM empleado WHERE id_empleado = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave_emp'])) {
            return true;
        } else {
            return false;
        }
    }

    public function readProfile()
    {
        $sql = 'SELECT id_empleado, nombre_usuario, nombre_emp, apellido_emp, telefono_emp
                FROM empleado
                WHERE id_empleado = ?';
        $params = array($_SESSION['id_empleado']);
        return Database::getRow($sql, $params);
    }

    public function editProfile()
    { 
        $sql = 'UPDATE empleado 
                SET nombre_usuario=?,nombre_emp=?,apellido_emp=?,telefono_emp=?
                WHERE id_empleado = ?';
        $params = array($this->nombreusuario, $this->nombreempleado, $this->apellidoempleado, $this->telefonoempleado, $_SESSION['id_empleado']);
        return Database::executeRow($sql, $params);
    }
}