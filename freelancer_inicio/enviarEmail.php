<?php
session_start();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

header("Content-Type: application/json");

require("./PHPMailer-master/src/PHPMailer.php");
require("./PHPMailer-master/src/SMTP.php");
require("./PHPMailer-master/src/Exception.php");

$message = "
<html>
<head>
<title>HTML</title>
</head>
<body>
<p>Nombre: ".$nombre." </p>
<p>Email: ".$email." </p>
<p>Telefono: ".$telefono." </p>
<p>Mensaje: ".$mensaje." </p>
</body>
</html>";

//Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
$mail->From = ""; //remitente
$mail->FromName = "Potential Customer";
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->SMTPSecure = 'STARTTLS'; //seguridad
$mail->Host = "smtp.office365.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username =''; //nombre usuario
$mail->Password = ''; //contraseña
$mail->AddAddress('comunicaciones@uraniosoluciones.com.co');
$mail->Subject = "Potential Customer";
$mail->Body = $message;
$mail->Send();

echo json_encode("");



?>