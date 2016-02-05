<?php 
	require 'db.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.pop3.php';

	function enviaMailF2($name,$email,$mensaje){
		//Envia Mail con link a F2
		$templateUser = file_get_contents('mail.html');
		$templateUser = str_replace('%name%', $name,$template);
		$templateUser = str_replace('%email%', $email,$template);
		$templateUser = str_replace('%hash%',$mensaje,$template);
		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;

		$mail->isSMTP();
		$mail->Host = 'mail.quality.com.mx';
		$mail->SMTPAuth = true;
		$mail->Username = 'marketing@quality.com.mx';
		$mail->Password = 'Accion559';
		$mail->Port = 587;
		$mail->setFrom('marketing@quality.com.mx','Contacto Quality');  
		$mail->addAddress($email,$name,$mensaje);
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Gracias por tu interés'; 
		$mail->Body = $templateUser;

		
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else{
			echo '<div id="respuestaAjax"><script type=\'text/javascript\'>
				thankYou(); </script></div>';
		}

	    }

	//Mail checker
	function checkMail($mail){
		$db = mysqli_connect('localhost', 'root', 'erik', 'gingin');
		if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $mail)){
			$sql = "SELECT `email` from users where `email` = '$mail';";
			$result = mysqli_query($db, $sql);
				if(mysqli_num_rows($result) == 0){
					return true;
				}else{
					return false;
				}
			
		}else{
			return false;
		}
	}


	if(isset($_POST['formulario'])){
				
				if(isset($_POST['nombre']) && !empty($_POST['nombre']) AND
				   isset($_POST['mail']) && !empty($_POST['mail']) AND
				   isset($_POST['mensaje']) && !empty($_POST['mensaje']) )

				{
					
					$mail = mysqli_real_escape_string($db,$_POST['mail']);
					$nombre = mysqli_real_escape_string($db,$_POST['nombre']);
					$mensaje = mysqli_real_escape_string($db,$_POST['mensaje']);
					

					
					$sql1 = "INSERT INTO users (`id`,`nombre`,`mail`,`mensaje`) 
					VALUES((SELECT `id` FROM general WHERE `email` = '$mail'),'$estado','$ciudad','$edad','$nivelestudios' ,'$ocupacion','$inversion','$membresia');";

					$result = mysqli_query($db, $sql1);
					
						if($result){
							echo "<div id='respuestaAjax'><script>sweetAlert('¡Gracias!', 'Hemos recibido correctamente tus datos', 'success'); $('form#f2 input, form#f2 select').attr('disabled','disabled'); </script></div>";
						}else{
							echo "<div id='respuestaAjax'><script>sweetAlert('Error', 'Ya hemos guardado tus datos', 'error'); </script></div>";
						}

				}else{
					echo "<div id='respuestaAjax'><script>sweetAlert('Error', 'Los datos están incompletos', 'error'); </script></div>";
				}

	}else{


					//Verifica datos ingresados
					if(isset($_POST['nombre']) && !empty($_POST['nombre']) AND 
					   isset($_POST['mail']) && !empty($_POST['mail']) AND
					   isset($_POST['tel']) && !empty($_POST['tel'])){
							
							//Salvar en variables locales
							$nombre= mysqli_real_escape_string($db,$_POST['nombre']);
							$mail= mysqli_real_escape_string($db,$_POST['mail']);
							$tel = mysqli_real_escape_string($db,$_POST['tel']);
							$mensaje=mysqli_real_escape_string($db,$_POST['mensaje']);
							$hash = sha1(rand(0,1000));


							if(checkMail($mail)){
								$sql = "INSERT INTO general (`id`, `nombre`, `email`, `tel`, `mensaje`, `hash`, `status`) VALUES('','$nombre','$mail','$tel','$mensaje','$hash','0')";
								$saveDB = mysqli_query($db, $sql);
									if($saveDB){
										enviaMailF2($nombre,$mail,$hash);
										//header('Location: ../thankyou.html');
									}else{
										echo "<div id='respuestaAjax'><script>sweetAlert('Error', 'Ocurrío un erro en la base de datos', 'error'); </script></div>";
									}
								
							}else{

								echo "<div id='respuestaAjax'><script>sweetAlert('Error', 'Este e-mail ya está en nuestra base de datos o es incorrecto', 'error'); </script></div>";
							}
					}else{
						echo "<div id='respuestaAjax'><script>sweetAlert('Error', 'Los datos están incompletos', 'error'); </script></div>";
					}




	}





 ?>