<?php

/**
 * Author: TecnicoaCR
 * Esta es la Clase Login
 * Maneja el proceso de inicio y cierre de sesión del usuario.
 */

    class Login {
      
        private $db_connection = null; // Objeto conexión a la base de datos
        public $errors = array(); // Array colección de mensajes de error
        public $messages = array(); // Array colección de mensajes de éxito / neutro

        /**
         * La función "__construct ()" se inicia automáticamente cada vez que se crea un objeto de esta clase,
         * Básicamente cuando se hace "$ login = new Login ();"
         */
        public function __construct() {
            // Crear / leer sesión, absolutamente necesario.
            session_start();

            //  Compruebe las posibles acciones de inicio de sesión:
            // si el usuario intentó cerrar sesión (sucede cuando el usuario hace clic en el botón de cerrar sesión)
            if (isset($_GET["logout"])) {
                $this->doLogout();
            }
            // inicio de sesión a través de datos de publicación 
            // (si el usuario acaba de enviar un formulario de inicio de sesión)
            elseif (isset($_POST["login"])) {
                $this->dologinWithPostData();
            }
        }

        /**
         * iniciar sesión con los datos POST
         */
        private function dologinWithPostData() {
            // chequeamos el contenido del formulario de acceso
            if (empty($_POST['user_name'])) {
                $this->errors[] = "El campo de nombre de usuario estaba vacío.";
            } elseif (empty($_POST['user_password'])) {
                $this->errors[] = "El campo de contraseña estaba vacío.";
            } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // Se creará una conexión de base de datos, usando las constantes de config / db.php (que cargamos en index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // Se cambia el conjunto de caracteres a utf8 y se comprueba
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // y si no hay errores de conexión, nos conectamos a la base de datos de trabajo
            if (!$this->db_connection->connect_errno) {
                // Recogemos los datos del POST
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // Iniciamos la Consulta de la base de datos, obteniendo toda la información del usuario seleccionado 
                // (permite iniciar sesión a través de la dirección de correo electrónico en el campo de nombre de usuario)
                
                $sql = "SELECT id_usuario, usuario, nombre, email, passwd_hash
                        FROM usuarios
                        WHERE usuario = '" . $user_name . "' OR email = '" . $user_name . "';";
               
                $result_of_login_check = $this->db_connection->query($sql);

                // y si el usuario existe 
                if ($result_of_login_check->num_rows == 1) {

                    // obtenemos los resultados (como un objeto)
                    $result_row = $result_of_login_check->fetch_object();

                    // usando la función password_verify() de PHP para verificar si la contraseña proporcionada se ajusta
                    // el hash de la contraseña del usuario
                    if (password_verify($_POST['user_password'], $result_row->passwd_hash )){
                        $result_row->user_password_hash;
                    

                        // Escribímos los datos de usuario en PHP SESSION (un archivo en su servidor)
                        $_SESSION['id_usuario'] = $result_row->id_usuario;
                        $_SESSION['usuario'] = $result_row->usuario;
                        $_SESSION['nombre'] = $result_row->nombre;
                        $_SESSION['email'] = $result_row->email;
                        $_SESSION['id_tipo_usuario'] = $result_row->id_tipo_usuario;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Has sido desconectado.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
