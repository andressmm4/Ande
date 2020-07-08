<?php
$nombre = $_POST['name'];
$email = $_POST['email']; 
$mensaje = $_POST['message'];
$receptor = "andiz132003";  

$uniqueid= uniqid('np');

//indicamos las cabeceras del correo
$headers = "MIME-Version: 1.0\r\n";
$headers .= "From: $email \r\n";
$headers .= "Subject: Test mail\r\n";

//Es importante indicar que el Content-Type
//es multipart/alternative de esta manera existirá un contenido alternativo

$headers .= "Content-Type: multipart/alternative;boundary=" . $uniqueid. "\r\n";
   
$message = "";
    
$message .= "\r\n\r\n--" . $uniqueid. "\r\n";
$message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
$message .= "E-mail en Texto Plano sin formato.";
    

// Este es el código que contiene la información y que además tiene formato

$message .= "\r\n\r\n--" . $uniqueid. "\r\n";
$message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
$message .= "<div style='background: #000000; border-radius: 2em; box-shadow: 5px 5px 10px #000000; color: #ffffff; height: auto; padding: 20px; position: relative; width: 90%;'";
$message .= "<table border=0 width=auto>";
$message .= "<tr><td><b>Nombre:</b> </td><td bgcolor=#F7D358><span style='font-size: 1.5em'>$nombre</span><br></td></tr>";
$message .= "<tr><td><b>E-mail:</b> </td><td>$email<br></td></tr>";
$message .= "<tr><td><b>Consulta:</b> </td><td>$mensaje<br></td></tr>";
$message .= "</table>";
$message .= "</div>";
$message .= "<br>";
    
$message .= "\r\n\r\n--" . $uniqueid. "--";
   
//enviamos el correo...

mail($receptor, 'Se ha recibido un nuevo mensaje de tu sitio web...', $message, $headers);
  
//doy gracias por el envío y redireccionamos al usuario a la página principal.
?>
<td align="center" height="400" width="55%">
 <span style="color: #003366; font-family: mistral; font-size: 2.3em">Hemos recibido su información, muy pronto le responderemos.</span>
</td>

  <script type="text/javascript">
   function redireccionar(){
    location.href="index.php";
   }
   setTimeout ("redireccionar()", 3000);
  </script>

<?

?>