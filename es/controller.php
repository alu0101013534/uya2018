<?php

function validate_email_regex($email){

	if(preg_match("/^([a-zA-Z0-9])([a-zA-Z0-9])([a-zA-Z0-9])([a-zA-Z0-9\.\_\-])*@([a-zA-Z0-9])([a-zA-Z0-9])([a-zA-Z0-9])([a-zA-Z0-9\.\_\-])*.([a-zA-Z])([a-zA-Z])([a-zA-Z])*$/", $email)){
		return true;
	}
	return false;
}

function validate_password_regex($password){

	if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&_])([A-Za-z\d$@$!%*?&]|[^ ]){5,10}$/", $password)){
		return true;
	}
	return false;
}

function validate_form_signup($usuario, $password, $firstname, $lastname, $email){
	$errores = array();
	// Campos obligatorios.
    if($usuario == ''){
        $errores[] = "El usuario es requerido";
    }
    if(!validate_password_regex($password) || $password = ''){
        $errores[] = "La contraseña es requerida y ha de ser mayor a 5 y menor a 10 caracteres, debe contener al menos 1 letra minuscula, 1 letra mayuscula, 1 digito, 1 caracter especial y sin espacios en blanco";
    }
    if($firstname == ''){
        $errores[] = "El nombre es requerido";
    }
    if($lastname == ''){
        $errores[] = "El apellido es requerido";
    }
    // El email es obligatorio y ha de tener formato adecuado.
    if(!validate_email_regex($email) || $email == ''){
        $errores[] = "No se ha indicado email o el formato no es correcto";
    }
    return $errores;
}

function validate_email($subject, $body, $head){
	// Campos obligatorios.
    if($subject == '' || $body == '' || $head == ''){
        return false;
    }
    return true;
}


/* Tratamiento BBDD */

function conect_bbdd(){
	
	$conexion = mysqli_connect("localhost", "id4973834_root", "12345", "id4973834_uya") or
    	die("Problemas con la conexión");

    return $conexion;
}

function disconect_bbdd($conexion){
	mysqli_close($conexion);
}

function create_user($usuario, $password, $firstname, $lastname, $email){
	$conexion = conect_bbdd();

	mysqli_query($conexion, "insert into User(Usu_name,Usu_pass,Usu_firstname,Usu_lastname,Usu_email) values ('$usuario','$password','$firstname','$lastname','$email')") or
  		die("Problemas en el select".mysqli_error($conexion));

	disconect_bbdd($conexion);
	return true;
}

function validate_user($usuario, $password){
	$conexion = conect_bbdd();

  	$registros = mysqli_query($conexion,"select Usu_name, Usu_pass from User where Usu_name='".$usuario."' and Usu_pass='".$password."'") or
  		die("Problemas en el select:".mysqli_error($conexion));

	if ($reg = mysqli_fetch_array($registros)){
		disconect_bbdd($conexion);
		session_start();
		$_SESSION['user'] = $usuario;
		$_SESSION['platform'] = 'uya';
		return true;
	}else{
		disconect_bbdd($conexion);
		//header("Location: loginerror.php"); // Incluir página error.
		return false;
	}
}



function secure_user(){
	@session_start();
	if($_SESSION['platform'] != 'uya'){ 
	  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
	  header("Location: login.php"); 
	  exit(); 
	} 
}



function disconect_user($usuario){

    $user = new Commandee($usuario);
    $logout = new disconnectCommand($user);
    callCommand($logout);
}

function delete_profile($usuario){
    $user = new Commandee($usuario);
    $delete = new deleteProfileCommand($user);
    callCommand($delete);
    return true;
}



class Commandee {
    private $user;
    function __construct($user_in) {
        $this->setUser($user_in);
    }
    function getUser() {
        return $this->user;
    }
    function setUser($user_in) {
        $this->user = $user_in;
    }
    function disconect_user() {
        session_start();
	   session_destroy(); // Eliminamos la sesión.
	   header("Location: login.php");

    }
    function delete_profile() {
        $conexion = conect_bbdd();

        mysqli_query($conexion, "delete from User where Usu_name='".$this->user."'") or
            die("Problemas en el select".mysqli_error($conexion));

        disconect_bbdd($conexion);
       // session_start();
        session_destroy(); // Eliminamos la sesión.
        return true;
    }
    
}


abstract class Command {
    protected $Commandee;
    function __construct($Commandee_in) {
        $this->Commandee = $Commandee_in;
    }
    abstract function execute();
}

class deleteProfileCommand extends Command {
    function execute() {
        $this->Commandee->delete_profile();
    }
}

class disconnectCommand extends Command {
    function execute() {
        $this->Commandee->disconect_user();
    }
}


function callCommand(Command $Command_in) {
    $Command_in->execute();
  }

?>