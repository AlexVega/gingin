<?php 	

	require 'db.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.pop3.php';

	/*function enviaMail($mail,$nombre,$mensaje){
		//Envia Mail
		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;

		$mail->isSMTP();
		$mail->Host = '';
		$mail->SMTPAuth = true;
		$mail->Username = 'marketing@quality.com.mx';
		$mail->Password = 'Accion559';
		$mail->Port = 587;
		$mail->setFrom('marketing@quality.com.mx','Contacto Quality');  
		$mail->addAddress($mail,$nombre,$mensaje);
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Gracias por tu interés'; 
		$mail->Body = "Alguien se ha registrado en el landing de Autoefectivo con los siguientes datos
                          Nombre: ".$name."
                          Email: ".$mail."
                          Mensaje: ".$mensaje;

		
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else{
			echo 'mensaje enviado';
		}

	    }
	    */
<<<<<<< HEAD

	//Mail checker
	function checkMail($mail){
=======
<<<<<<< HEAD
	    	function checkMail($mail){
=======

	//Mail checker
	function checkMail($mail){
>>>>>>> b014190ff2b37fa97bd4549eb1268f4e3f52f2e8
>>>>>>> f859ecf3683410a46e85438deb23bc126f1294f2
if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $mail)){
					return true;
				}else{
					return false;
				}
<<<<<<< HEAD
			
		}	
=======
<<<<<<< HEAD
				
}				
	      		


=======
			
		}	
>>>>>>> b014190ff2b37fa97bd4549eb1268f4e3f52f2e8
>>>>>>> f859ecf3683410a46e85438deb23bc126f1294f2
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
	echo "<div id='respuestaAjax'><script>document.getElementById('formulario').reset(); </script> 
							<script>sweetAlert('¡Gracias!','Datos guardados', 'success'); </script></div>";

<<<<<<< HEAD

				}


				

	if(checkMail($mail)){
	$sql = "INSERT INTO users (`id`, `nombre`, `email`, `mensaje`) VALUES('','$nombre','$mail','$mensaje')";
    $saveDB = mysqli_query($db, $sql);
	if($saveDB){
		echo "Datos guardados";


	//*enviaMail($nombre,$mail,$mensaje);
    //header('Location: ../thankyou.html');
	}else{
	echo "Error no se guardo en base de datos";
	echo   mysqli_error($db);
		}
								
	}else{

    echo "Mail invalido";
		  }
  
=======
<<<<<<< HEAD


	//*enviaMail($nombre,$mail,$mensaje);
    //header('Location: ../thankyou.html');
    }

	else{
	echo "<div id='respuestaAjax'>
						<script>sweetAlert('Error','Ocurrio un error en la base de datos','error'); </script></div>"; 
	echo   mysqli_error($db);

		}
	}

else{
	echo "<div id='respuestaAjax'> 
						 	<script>sweetAlert('Error','Error mail invalido','error'); </script></div>";
								
	}
	}	

	else{
=======

				}


				

	if(checkMail($mail)){
	$sql = "INSERT INTO users (`id`, `nombre`, `email`, `mensaje`) VALUES('','$nombre','$mail','$mensaje')";
    $saveDB = mysqli_query($db, $sql);
	if($saveDB){
		echo "Datos guardados";
>>>>>>> b014190ff2b37fa97bd4549eb1268f4e3f52f2e8

   echo "<div id='respuestaAjax'>
		        <script>sweetAlert('Error','Campos vacios','error'); </script></div>";
		 }

<<<<<<< HEAD
		 

=======
	//*enviaMail($nombre,$mail,$mensaje);
    //header('Location: ../thankyou.html');
	}else{
	echo "Error no se guardo en base de datos";
	echo   mysqli_error($db);
		}
								
	}else{

    echo "Mail invalido";
		  }
  
>>>>>>> b014190ff2b37fa97bd4549eb1268f4e3f52f2e8
>>>>>>> f859ecf3683410a46e85438deb23bc126f1294f2





 ?>
 
