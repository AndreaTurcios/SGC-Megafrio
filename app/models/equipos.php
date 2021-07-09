<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Equipos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_equipo = null;
    private $id_proveedor = null;
    private $id_tipo_equipo = null;
    private $id_capacidad = null;
    private $nombre_equipo = null;
    private $descripcion_equipo = null;
    private $precio_equipo = null;
    private $modelo = null;
    private $voltaje = null;
    private $serie = null;
    private $foto_equipo = null;
    private $ruta = '../../resources/img/productos/';

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdProveedor($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdTipoEqui($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCapacidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_capacidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->descripcion_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio_equipo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setModelo($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->modelo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setVoltaje($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->voltaje = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setSerie($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->serie = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFoto($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->foto_equipo = $this->getImageName();
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
        return $this->id_equipo;
    }

    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    public function getIdTipoEqui()
    {
        return $this->id_tipo_equipo;
    }

    public function getIdCapacidad()
    {
        return $this->id_capacidad;
    }

    public function getNombre()
    {
        return $this->nombre_equipo;
    }

    public function getDescripcion()
    {
        return $this->descripcion_equipo;
    }

    public function getPrecio()
    {
        return $this->precio_equipo;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getVoltaje()
    {
        return $this->voltaje;
    }

    public function getSerie()
    {
        return $this->serie;
    }

    public function getFoto()
    {
        return $this->foto_equipo;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_equipo, nombre_equipo, descripcion_equipo, precio_equipo, modelo, voltaje, serie,id_proveedor, id_tipo_equipo, id_capacidad
                FROM equipo
                WHERE nombre_equipo ILIKE ? OR descripcion_equipo ILIKE ?
                ORDER BY nombre_equipo';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO equipo(nombre_equipo, descripcion_equipo, precio_equipo, modelo, voltaje, serie, foto_equipo, id_proveedor, id_tipo_equipo, id_capacidad)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre_equipo, $this->descripcion_equipo, $this->precio_equipo, $this->modelo, $this->voltaje, $this->serie, $this->foto_equipo, $this->id_proveedor, $this->id_tipo_equipo, $this->id_capacidad);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_equipo, foto_equipo, nombre_equipo, descripcion_equipo, precio_equipo, modelo, voltaje, serie,id_proveedor, id_tipo_equipo, id_capacidad
                FROM equipo 
                ORDER BY nombre_equipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_equipo, foto_equipo, nombre_equipo, descripcion_equipo, precio_equipo, modelo, voltaje, serie,id_proveedor, id_tipo_equipo, id_capacidad
                FROM equipo
                WHERE id_equipo = ?';
        $params = array($this->id_equipo);
        return Database::getRow($sql, $params);
    }

    public function updateRow($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        ($this->foto_equipo) ? $this->deleteFile($this->getRuta(), $current_image) : $this->foto_equipo = $current_image;

        $sql = 'UPDATE equipo
                SET foto_equipo = ?, nombre_equipo = ?, descripcion_equipo = ?, precio_equipo = ?, modelo = ?, voltaje = ?, serie = ?, id_proveedor = ?, id_tipo_equipo = ?, id_capacidad = ?,
                WHERE id_producto = ?';
        $params = array($this->foto_equipo, $this->nombre_equipo, $this->descripcion_equipo, $this->precio_equipo, $this->modelo, $this->voltaje, $this->serie, $this->id_proveedor, $this->id_tipo_equipo, $this->id_capacidad, $this->id_equipo);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM equipo
                WHERE id_equipo = ?';
        $params = array($this->id_equipo);
        return Database::executeRow($sql, $params);
    }

    public function readProveedor()
    {
        $sql = 'SELECT id_proveedor, nombre_compania FROM proveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readTipoEquipo()
    {
        $sql = 'SELECT id_tipo_equipo, tipo_equipo FROM tipoequipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readCapacidad()
    {
        $sql = 'SELECT id_capacidad, capacidad FROM capacidad';
        $params = null;
        return Database::getRows($sql, $params);
    }
}
