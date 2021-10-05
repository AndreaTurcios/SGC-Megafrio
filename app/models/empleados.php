<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../libraries/phpmailer/src/Exception.php';
require '../libraries/phpmailer/src/PHPMailer.php';
require '../libraries/phpmailer/src/SMTP.php';
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Empleados extends Validator{
    
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombreusuario = null;
    private $nombreempleado = null;
    private $apellidoempleado = null;
    private $telefonoempleado = null;
    private $claveempleado = null;
    private $idtipoempleado = null;
    private $estado = null;
    private $correo = null;
    private $intentosC = null;
    private $correoError = null;
    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setPasswordAlias($value, $alias)
    {
        if ($this->validatePasswordAlias($value, $alias)) {
            return true;
        } else {
            return false;
        }
    }

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

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
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

    public function getCorreo()
    {
        return $this->correo;
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

    public function getCorreoError()
    {
        return $this->correoError;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

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
        $sql = 'SELECT id_empleado, nombre_usuario, nombre_emp,apellido_emp,telefono_emp,estado,tipoemp
                FROM empleado 
                INNER JOIN tipoempleado USING(id_tipo_emp)
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
        $sql = 'SELECT id_empleado, id_tipo_emp, estado, nombre_usuario, correo FROM empleado WHERE nombre_usuario = ?';
        $params = array($nombreusuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_empleado'];
            $this->idtipoempleado = $data['id_tipo_emp'];
            $this->estado = $data['estado'];
            $this->nombreusuario = $data['nombre_usuario'];
            $this->correo = $data['correo'];
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

    public function estadoEmpleadoR()
    {
        $sql ='SELECT estado, COUNT(nombre_emp) as cantidad
        From empleado 
        Group by estado';
        $params = null;
        return Database::getRows($sql, $params);

    }

    public function readReport()
    {
        $sql = 'SELECT em.nombre_emp,em.apellido_emp,em.nombre_usuario, em.telefono_emp,te.tipoemp
        FROM empleado em  
        INNER JOIN tipoempleado te USING(id_tipo_emp)
        WHERE id_empleado = ?';
         $params = array($this->id);
         return Database::getRows($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    public function topEmpleados()
    {
        $sql = 'SELECT nombre_usuario, COUNT(id_agenda) cantidad
                FROM empleado INNER JOIN agenda USING(id_empleado)
                WHERE estado_tarea = true
                GROUP BY nombre_usuario ORDER BY cantidad DESC
                LIMIT 3';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function changePassword()
    {
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash($this->claveempleado, PASSWORD_DEFAULT);
        $sql = 'UPDATE empleado SET clave_emp = ? WHERE id_empleado = ?';
        $params = array($hash, $_SESSION['id_empleado']);
        return Database::executeRow($sql, $params);
    }


    //Funciones para contraseña


    public function generarCodigoRecu($longitud){
        //creamos la variable codigo
        $codigo = "";
        //caracteres a ser utilizados
        $caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //el maximo de caracteres a usar
        $max=strlen($caracteres)-1;
        //creamos un for para generar el codigo aleatorio utilizando parametros min y max
        for($i=0;$i < $longitud;$i++)
        {
            $codigo.=$caracteres[rand(0,$max)];
        }
        //regresamos codigo como valor
        return $codigo;
    }

    public function enviarCorreo($correo, $codigo){
        // Inicio
        $mail = new PHPMailer(true);

            // Configuracion SMTP
            $mail->SMTPDebug = 0;                      // Mostrar salida (Desactivar en producción)
            $mail->isSMTP();                                               // Activar envio SMTP
            $mail->Host  = 'smtp.gmail.com';                     // Servidor SMTP
            $mail->SMTPAuth  = true;                                       // Identificacion SMTP
            $mail->Username  = 'recuperacion.megafrio@gmail.com';                  // Usuario SMTP
            $mail->Password  = 'megafrio123';	  	          // Contraseña SMTP
            $mail->SMTPSecure = 'tls';
            $mail->Port  = 587;
            $mail->setFrom("recuperacion.megafrio@gmail.com", "Megafrio");                // Remitente del correo

            // Destinatarios
            $mail->addAddress($correo);  // Email y nombre del destinatario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Código para restaurar contraseña';
            $mail->Body = 'Estimado usuario, ' .$correo .'. 
                        Por este medio le enviamos el codígo de verificación para continuar con el proceso de restauración de contraseña
                        El cual es:<b>'.$codigo.'!</b>';

            if($mail->send()){
                return true;
            } else{
                return false;
            }
    }

    public function updateCodigo2($codigo_con)
    {
        $sql = 'UPDATE empleado SET codigo_recu = ? WHERE id_empleado = ?';
        $params = array($codigo_con, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function checkCodigo2($restauracion)
    {
        $sql = 'SELECT id_empleado, codigo_recu, nombre_usuario FROM empleado WHERE correo = ?';
        $params = array($_SESSION['correo_cli_us']);
        $data = Database::getRow($sql, $params);
        if ($restauracion == $data['codigo_recu']) {
            $this->id = $data['id_empleado'];
            $this->alias = $data['nombre_usuario'];
            $sql = 'UPDATE empleado SET codigo_recu = null WHERE id_empleado = ?';
            $params = array($this->id);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    public function obtenerDiff()
    {
        $sql = 'SELECT fechacontra from empleado where id_empleado = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        $fechaHoy = date('Y-m-d');
        $dateDifference = abs(strtotime($fechaHoy) - strtotime($data['fechacontra']));
        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
        $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));

        if($months>=3){
            return true;
        }else{
            return false;
        }
    }

     // Funciones para agregar intentos
     public function agregarIntentosEmp()
     {   
         $sql = 'SELECT intentos FROM empleado WHERE id_empleado = ?';
         $params = array($this->id);
         if($data = Database::getRow($sql, $params)){
             if($data['intentos'] >=3 ){
                 
                 $sql = 'UPDATE empleado SET estado = false where id_empleado = ?';
                 $params = array( $this->id);
                 return Database::executeRow($sql, $params);
             } else {
                 $this->intentosC = $data['intentos'];
                 $intentos = $this->intentosC + 1;
                 $sql = 'UPDATE empleado SET intentos = ? where id_empleado = ?';
                 $params = array($intentos, $this->id);
                 return Database::executeRow($sql, $params);
             }
         } else {
             return false;
         }
 
     }

    public function resetearIntentos()
    {
        $sql = 'UPDATE empleado SET intentos = null where id_empleado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }


}