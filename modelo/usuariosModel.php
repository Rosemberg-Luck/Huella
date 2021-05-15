<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

header('Content-Type: text/html; charset=UTF-8');

class Usuarios
{
    private $db;
    public function __construct()
    {
        $this->listaUsuarios = array();
    }

    public function abrirConexion()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=huella', "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->db;
    }

    public function cerrarConexion()
    {
        $this->db = null;
    }

    public function getUsuarios()
    {
        /*Método para obtener la lista de todos los usuarios
        la lista quedará del siguiente modo:
        $this->listaUsuarios[0]["nombre"]=Gabriel Villa. #Esto refleja el campo nombre del registro 0 encontrado
        $this->listaUsuarios[0]["email"]=gabrielvilla98@outlook.com $Refleja el campo email del registro 0 encontrado
        Cambiando el primer índice se puede acceder al número de registro.
        Cambiando el segundo índice se puede acceder a cada columna dentro del registro.
        */
        $this->abrirConexion();
        $sql = "SELECT idUsuario,nombre,email,pass,telefono FROM usuarios";
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $this->listaUsuarios[] = $res;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Problemas con la bd";
        }
        $this->cerrarConexion();
        return $this->listaUsuarios;
    }

    public function getUsuarioActual($email)
    {
        /*Método para obtener los datos del usuario actual.Puede servir para colocar información del propio
        usuario para que aparezca en la sección de editar su información personal.
        */
        $this->abrirConexion();
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $usuario = array();
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $usuario["idUsuario"] = $res["idUsuario"];
                    $usuario["nombre"] = $res["nombre"];
                    $usuario["email"] = $res["email"];
                    $usuario["pass"] = $res["pass"];
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "La base de datos no está inicializada o no hay acceso a ella";
        }
        $this->cerrarConexion();
        return $usuario;
    }

    public function updateUsuario($idUsuario,$pass)
    {
        $sql = "UPDATE usuarios SET pass='$pass' WHERE idUsuario='$idUsuario';";
        $this->abrirConexion();
        $mensaje = "";
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                $mensaje = "Contraseña actualizada con éxito por '$pass'";
            } else {
                $mensaje = "No se ha actualizado ningún registro,comprobar parámetros ó se están devolviendo los mismos datos";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
        return $mensaje;
    }

    public function login($email, $pass)
    {
        $sql = "select * from usuarios where email='$email' and pass='$pass'";
        $this->abrirConexion();
        $mensaje= "";
        try {

            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                session_start();
                $_SESSION['usuario'] = $email;
                header('Location:../controladores/adminController.php');
            } else {
                $mensaje= "Datos incorrectos, vuelva a intentarlo";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
        return $mensaje;
    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        header('Location:../controladores/homeController.php');
    }

    public function register($nombre, $email, $pass)
    {
        $mensaje = "";
        $sql = "INSERT INTO usuarios(nombre,email,pass) VALUES ('$nombre','$email','$pass');";
        $this->abrirConexion();
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {
                $mensaje = "Usuario registrado";
            } else {
                $mensaje = "Usuario no registrado";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $this->cerrarConexion();
        return $mensaje;
    }

    public function getUsernameById($idUser)
    {
        $this->abrirConexion();
        $sql = "SELECT nombre FROM usuarios WHERE idUsuario=$idUser";
        $username = "";
        if (isset($this->db)) {
            try {
                $respuesta = $this->db->prepare($sql);
                $respuesta->execute();
                foreach ($respuesta as $res) {
                    $username = $res["nombre"];
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "La base de datos no está inicializada o no hay acceso a ella";
        }
        $this->cerrarConexion();
        return $username;
    }

    public function recuperar($email, $pass)
    {

        $sql = "select email from usuarios where email='$email'";
        $this->abrirConexion();
        $mensaje = "";
        try {
            $respuesta = $this->db->prepare($sql);
            $respuesta->execute();
            if ($respuesta->rowCount() == 1) {

                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;                                          // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = '@gmail.com';                     // SMTP username
                    $mail->Password   = '';                               // SMTP password
                    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 465;

                    //Recipients
                    $mail->setFrom('@gmail.com', 'Huella');
                    $mail->addAddress($email, $email);


                    // Content
                    $mail->isHTML(false);                                  // Set email format to HTML
                    $mail->Subject = 'Recuperacion de clave';
                    $mail->Body    = "Su clave es: " . $pass;

                    $mail->send();
                    $mensaje = 'El mensaje se envio correctamente.<br>
                                    Si no encuentra el mensaje revisar en correo no deseado.';
                } catch (Exception $e) {
                    $mensaje = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $mensaje = "El email ingresado no se encuentra registrado";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $mensaje;
    }

    public function EliminarCuenta($id)
    {
        $mensaje = '';
        $sql1 = "DELETE from proyectos where idUsuario='$id'";
        $sql2 = "DELETE from usuarios where idUsuario='$id'";
        $this->abrirConexion();
        try {

            $respuesta1 = $this->db->prepare($sql1);
            $respuesta2 = $this->db->prepare($sql2);
            $respuesta1->execute();
            $respuesta2->execute();
            if ($respuesta2->rowCount() == 1) {

                session_unset();
                header("Location:../controladores/indexController.php");
            } else {
                $mensaje = "No se pudo eliminar la cuenta";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        $this->cerrarConexion();
        return $mensaje;
    }

    public function Contacto($nombre, $apellido, $emailC, $telefono, $motivo, $mensaje)
    {

        $email = "empresahuella@gmail.com";
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();
            $mail->SMTPAuth = true;                                          // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = '@gmail.com';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('@gmail.com', 'Huella');
            $mail->addAddress($email, $email);
            // Content
            $mail->isHTML(false);                                  // Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Contacto de: ' . $nombre;
            $mail->Body    = "Nombre: " . $nombre . "\nApellido:" . $apellido . "\nCorreo: "
                . $emailC . "\nNumero telefonico: " . $telefono.
                "\nMotivo: " . $motivo . "\nMensaje:" . $mensaje;

            $mail->send();
            $mensaje = 'El mensaje se envio correctamente.<br>
                                    Responderemos lo más pronto posible.';
        } catch (Exception $e) {
            $mensaje = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return $mensaje;
    }
}
