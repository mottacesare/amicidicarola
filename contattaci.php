<?php

require_once("utils.php");
//
createPageHeader("contattaci.php");
//
/*if (isset($_POST["submit"])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$from = 'amicidicarola@gmail.com'; 
	$to = 'cesare.motta89@gmail.com'; 
	$subject = 'Messaggio dal Sito Amici di Carola ';
	//
	$body = "From: $name\n E-Mail: $email\n Message:\n $message";
	//
	// Check if name has been entered
	if (!$_POST['name']) {
		$errName = 'Nome Obbligatorio';
	}
	
	// Check if email has been entered and is valid
	if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errEmail = 'Email Obbligatoria';
	}
	
	//Check if message has been entered
	if (!$_POST['message']) {
		$errMessage = 'Messaggio Obbligatorio';
	}
	//
	// If there are no errors, send the email
	if (!$errName && !$errEmail && !$errMessage) {
		if (mail ($to, $subject, $body, $from)) {
			$result='<div class="alert alert-success">Messaggio inviato correttamente!</div>';
		} else {
			$result='<div class="alert alert-danger">Errore durante l\'invio. Riprovare più tardi</div>';
		}
	}
}*/
//
echo "	
	<!--start-parts-->
	<div class=\"parts-section\" style=\"height:100%;background-color:rgba(255,255,255,0.75);\">
		<div class=\"container\">
		
			<div style=\"height:50px;\">
				<h3>Contattaci</h3>
			</div>";
//
/*echo '
			<div class="contact-section" style="padding:0px;">
				<form>
					<input style="color:#000000;border: 2px solid gray;" placeholder="Nome" type="text" class="text">
					<input style="color:#000000;border: 2px solid gray;" placeholder="Mail" type="text" class="text">
					<input style="color:#000000;border: 2px solid gray;" placeholder="Oggetto" type="text" class="text">
					<textarea style="color:#000000;border: 2px solid gray;" placeholder="Messaggio"></textarea>	
					<div class="clearfix"> </div>
					<input style="color:#000000;border: 2px solid gray;" type="submit" value="INVIA MESSAGGIO">
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		$(window).load(function() {
			$(".flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,            
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
		});
	</script>
';*/

/*echo '
<form class="form-horizontal" role="form" method="post" action="contattaci.php">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Nome</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il tuo Nome e Cognome" value="'.htmlspecialchars($_POST['name']).'">
			<p class="text-danger">'.$errName.'</p>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="Inserisci la tua Email" value="'.htmlspecialchars($_POST['email']).'">
			<p class="text-danger">'.$errEmail.'</p>
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Messaggio</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="message" placeholder="Inserisci il tuo Messaggio" >'.htmlspecialchars($_POST['message']).'</textarea>
			<p class="text-danger">'.$errMessage.'</p>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Invia" class="btn btn-primary">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			'.$result.'
		</div>
	</div>
</form>
';*/

//
echo "<div><h3>Telefono: <b>3458540309</b></h3></div>";
echo "<div><h3>Email: <b>amicidicarola@yahoo.it</b></h3></div>";
echo "<div><h3>Facebook: <b><a style=\"color:blue;text-decoration:underline;\" href='https://www.facebook.com/groups/246776938837029/' target='_blank'>Vai a Facebook</a></b></h3></div>";
//
createPageFooter();
?>
