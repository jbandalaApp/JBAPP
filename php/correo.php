<?php

$nombre= $_POST['nombre'];
$telefono= $_POST['telefono'] ;
$email= $_POST['email'];
$servicio= $_POST['servicio'];
$mensaje=$_POST['mensaje'];
require("../recursos/mail/class.phpmailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.jbandala.mx"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "clientes@jbandala.mx"; // Correo completo a utilizar
$mail->Password = "clientes2013"; // Contraseña
$mail->Port = 26; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = "clientes@jbandala.mx"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Contacto App";

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress("karina@jbandala.com"); // Esta es la dirección a donde enviamos
/*$mail->AddAddress("eric@jbandala.com");
$mail->AddAddress("direccion@jbandala.com");*/
//$mail->AddCC("eric@jbandala.com","direccion@jbandala.com");
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Contacto App"; // Este es el titulo del email.
$body = "Nombre:".$nombre."<br />";
$body .= "Telefono:".$telefono."<br />";
$body .= "E-mail:".$email."<br />";
$body .= "Servicio:".$servicio."<br />";
$body .= "Mensaje:".$mensaje."<br />";
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
/*if($exito){
echo 'El correo fue enviado correctamente.';
}else{
echo 'Hubo un inconveniente. Contacta a un administrador.';
}*/
echo $exito;
/*
if($exito){
echo '1';
}else{
echo '0';
}
*/
?>
