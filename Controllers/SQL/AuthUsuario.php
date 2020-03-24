<?php
require_once ('../../Models/Class_conexion.php');
require_once ('../../Models/Class_consultas.php');
	
$mensaje = null;


if ( isset($_POST['arg_numId']) && isset($_POST['arg_psw'])  )
 {

if ( count($_POST['arg_numId']) > 0 && count($_POST['arg_psw']) > 0  )
 {
	# code...


	$arg_numId = $_POST['arg_numId'];
	
	$arg_psw = $_POST['arg_psw'];
	
	

	$consultas = new Consultas();
	$resultado = $consultas->AuthUsuario($arg_numId,$arg_psw);
	if(count($resultado)>1){
		session_start();
		$_SESSION['user'] = $resultado;
		#@session_start(); session_destroy(); header("Location: index.php");
		header ("Location: ../../Views/HOME.php");
	}else{
		echo "Datos incorrectos";
	}
}else{
	echo "Debe diligenciar todos los valores"; 
}

}else{
	header ("Location: ../../index.php");
}


?>