<?php

class Estado_pago extends Validator
{   
    private $id_estado_pago = null;

    public function setEstado($value){
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_pago = $value;
            return true;  
        } else {
            return false;
        }
    }

    public function getEstado(){
        return $this->id_estado_pago;
    }

    public function readCliente()
    {
        $sql = 'SELECT cli.id_cliente, cli.nombre_cli, cli.telefono_cli, cli.dui_cli, cli.nit_cli, cli.direccion_cli, cli.correo_cli, ep.estado_pago  
        FROM clientes cli
        INNER JOIN estado_pago ep on cli.id_estado_pago = ep.id_estado_pago
        WHERE ep.id_estado_pago = ?';
        $params = array($this->id_estado_pago);
        return Database::getRows($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_estado_pago, estado_pago FROM estado_pago';
        $params = null;
        return Database::getRows($sql, $params);
    }
}