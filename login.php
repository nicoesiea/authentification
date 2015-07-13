<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Exemple AUTHENTIFICATION</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>

		<!-- 		<link type="text/css" href="xxx" rel="stylesheet" />	-->
		<!-- 		<script type="text/javascript" src="xxx"></script> -->
	</head>
	<body>
		<?php
			include ("../menu.html");
		?>
		<div class="container theme-showcase" role="main">
			<div class="jumbotron">
				<center>
					<h1>Authentification</h1>
					<h3>Exemple</h3>
				</center>
			</div>
			<center>
				<p style="font-size: 1.3em; line-height: 1.5; margin: 1em 0; width: 50%;">Cette page est le point d'entrée servant de saisie pour le login/mot de passe de l'utilisateur</p>
				
				
				
				<button type="button" class="btn btn-anyStyle btn-lg admin" data-toggle="modal" data-target="#loginModal" data-whatever="@mdo" style="background-color: white;">
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				</button>
				
				
				
			</center>
			
		</div>
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Authentification</h4>
					</div>
					<div class="modal-body">
						<form id="form">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Email:</label>
								<input type="text" class="form-control" id="user" value="">
							</div>
							<div class="form-group">
								<label for="message-text" class="control-label">Mot de passe:</label>
								<input type="password" class="form-control" id="pwd" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" id="connect" class="btn btn-primary">Connexion</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<form class="hide" id="redirect" method="post" action="noAction">
		<input class="hide" id="token" name="token" type="password" value="noValue" />
		<input class="hide" id="id" name="id"  type="password" value="noValue" />
	</form>
	</body>
	<center>&copy; Dumont Nicolas</center>
	<script src="./authentification.js"></script>
</html>

