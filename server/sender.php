<?php 	
	require 'db.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	//require 'phpmailer/class.pop3.php';

	function MailGin($correo,$nom,$msj){
		//Envia Mail
		$mail = new PHPMailer;
		$mail->Host = gethostbyname('smtp.gmail.com');
		//$mail->SMTPDebug = 3;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";
		$mail->Username = 'erik@concepthaus.mx';
		$mail->Password = 'programacion2016';
		$mail->Port =  587;
		$mail->setFrom('erik@concepthaus.mx','Erik Rodriguez');  
		$mail->addAddress('jcisneros@iegroup.mx ','Cisneros');
		$mail->addAddress('contacto@iegroup.mx','Iegroup');
		$mail->addAddress('erik@concepthaus.mx','Developer');
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Nuevo usuario en GinGin'; 
		$mail->Body = '<html><h1>Alguien se a puesto en contacto con GinGin<h1><br><br><br>

		Nombre :'.$nom.' <br><br>
		E-mail :'.$correo.' <br><br>
		Mensaje: '.$msj;

		$mail->send();

/*   if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent' ;
        }
        */

    }
                         





	//Mail checker
	function checkMail($mail){
if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $mail)){
					return true;
				}else{
					return false;
				}
				
}	
				if(isset($_POST['nombre']) && !empty($_POST['nombre']) AND
				   isset($_POST['mail']) && !empty($_POST['mail']) AND
				   isset($_POST['mensaje']) && !empty($_POST['mensaje']) )
				{
					
					$mail = mysqli_real_escape_string($db,$_POST['mail']);
					$nombre = mysqli_real_escape_string($db,$_POST['nombre']);
					$mensaje = mysqli_real_escape_string($db,$_POST['mensaje']);
					
    if(checkMail($mail)){
	$sql = "INSERT INTO users (`id`, `nombre`, `email`, `mensaje`) VALUES('','$nombre','$mail','$mensaje')";
    $saveDB = mysqli_query($db, $sql);
	if($saveDB){
		MailGin($mail,$nombre,$mensaje);
	echo "<div id='respuestaAjax'><script>document.getElementById('formulario').reset(); </script> 
							<script>
							swal({   title: 'GRACIAS',   
							text: 'En breve nos comunicaremos contigo',   
							imageUrl: './img/succes.png',  
							confirmButtonColor: '#000'
							 });
						 	 </script></div>";
	//*enviaMail($nombre,$mail,$mensaje);
    //header('Location: ../thankyou.html');
    }
	else{
	echo "<div id='respuestaAjax'> 
						 	<script>
							swal({   title: 'ERROR',   
							text: 'Error en base de datos',   
							imageUrl: './img/error.png',  
							confirmButtonColor: '#000'
							 });
						 	 </script></div>"; 
	echo   mysqli_error($db);
		}
	}
else{
	echo "<div id='respuestaAjax'> 
						 	<script>
							swal({   title: 'ERROR',   
							text: 'Mail invalido',   
							imageUrl: './img/error.png',  
							confirmButtonColor: '#000'
							 });
						 	 </script></div>";
								
	}
	}	
	else{
echo "<div id='respuestaAjax'> 
						 	<script>
							swal({   title: 'ERROR',   
							text: 'Datos incompletos',   
							imageUrl: './img/error.png',  
							confirmButtonColor: '#000'
							 });
						 	 </script></div>";
				}
 ?>
 