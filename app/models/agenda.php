<?php
/*
*	Clase para manejar la tabla agenda de la base de datos. Es clase hija de Validator.
*/

class Agenda extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $id_cliente = null;
    private $id_empleado = null;
    private $fecha_programacion = null;
    private $hora_programacion = null;
    private $fecha_provisional = null;
    private $hora_provisional = null;
    private $tarea = null;
    private $estado_tarea = null;
    private $observaciones = null;
    private $fechaActual = null;
    
    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEmpleado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_empleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaProgramacion($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_programacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setHoraProgramacion($value)
    {
        if ($this->validateString($value, 1, 6)) {
            $this->hora_programacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaProvisional($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_provisional = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setHoraProvisional($value)
    {
        if ($this->validateString($value, 1, 6)) {
            $this->hora_provisional = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTarea($value)
    {
        if ($this->validateAlphanumeric($value, 1, 10)) {
            $this->tarea = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado_tarea = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setObservaciones($value)
    {
        if ($this->validateAlphanumeric($value, 1, 1000)) {
            $this->observaciones = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaActual($value)
    {
        if ($this->validateDate($value)) {
            $this->fechaActual = $value;
            return true;
        } else {
            return false;
        }
    }
    
    /*
    *   Métodos para obtener valores de los atributos.
    */

    public function getId()
    {
        return $this->id;
    }

    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function getIdEmpleado()
    {
        return $this->id_empleado;
    }

    public function getFechaProgramacion()
    {
        return $this->fecha_programacion;
    }

    public function getHoraProgramacion()
    {
        return $this->hora_programacion;
    }

    public function getFechaProvisional()
    {
        return $this->fecha_provisional;
    }

    public function getHoraProvisional()
    {
        return $this->fecha_provisional;
    }

    public function getTarea()
    {
        return $this->tarea;
    }

    public function getEstado()
    {
        return $this->estado_tarea;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function getFechaActual()
    {
        return $this->fechaActual;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT id_agenda, nombre_cli, nombre_usuario, fecha_programacion, hora_programacion, fecha_provisional, hora_provisional, tarea, estado_tarea, observaciones
                FROM agenda INNER JOIN empleado USING(id_empleado) 
                INNER JOIN clientes USING(id_cliente)
                WHERE nombre_cli ILIKE ? OR fecha_provisional = ?';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO productos(nombre_producto, descripcion_producto, precio_producto, imagen_producto, estado_producto, id_categoria, id_usuario)
                VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_agenda, nombre_cli, nombre_usuario, fecha_programacion, hora_programacion, fecha_provisional, hora_provisional, tarea, estado_tarea, observaciones
                FROM agenda INNER JOIN empleado USING(id_empleado) 
                INNER JOIN clientes USING(id_cliente)
                WHERE fecha_provisional = ?';
        $params = array($this->fechaActual);
        return Database::getRows($sql, $params);
    }

    public function readClientes()
    {
        $sql = 'SELECT id_cliente, nombre_cli FROM clientes';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_agenda, id_cliente, id_empleado, fecha_programacion, hora_programacion, fecha_provisional, hora_provisional, tarea, estado_tarea, observaciones
                FROM agenda
                WHERE id_agenda = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {

        $sql = 'UPDATE agenda
                SET id_cliente = ?, id_empleado = ?, fecha_programacion = ?, hora_programacion = ?, fecha_provisional = ?, hora_provisional = ?, tarea = ?, estado_tarea = ?, observaciones = ?
                WHERE id_agenda = ?';
        $params = array($this->id_cliente, $this->id_cliente, $this->fecha_programacion, $this->hora_programacion, $this->fecha_provisional, $this->fecha_provisional, $this->tarea, $this->estado_tarea, $this->observaciones);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM agenda
                WHERE id_agenda = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>