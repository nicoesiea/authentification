<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Cible</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	</head>
	<body>
		<?php
			include ("../menu.html");
			
			      //SI L'AUTHENTIFICATION EST VALIDE, ON AJOUTE LES INFORMATIONS D'IDENTIFICATION SUR LA PAGE
			      function addLogin($token, $id){
			      	echo "<div class='hide' id='userIdentification'>";
			      	echo "  <div class='hide' id='token'>".$token."</div>";
			      	echo "  <div class='hide' id='id'>".$id."</div>";
			      	echo "</div>";
			      }
			      
			      //VERSION POUR GERER LES VARIABLES 'POST'
			      function processPOST($_POST){
			      	$token = $_POST['token'];
			      	$id = $_POST['id'];
			      	//On se connecte d'abord à MySQL :
			      	mysql_connect("sql.free.fr", "LOGIN", "MOT_DE_PASSE");
			      	mysql_select_db("BASE_DE_DONNEES");
			      
			      	//VERIFICATION TOKEN
			      	$query = "SELECT count(*) FROM TABLE_USER WHERE id = '".$id."' AND token LIKE '".$token."'";
			      	$validation= mysql_query($query) or die (mysql_error());
			      	$valide=mysql_fetch_row($validation);
			      	if (isset($valide[0]) && $valide[0]==1) {
			      		addLogin($token, $id);
			      		return TRUE;
			      	}
			      	else {
			      		echo "Token/id non valide";
			      		echo "<br/>";
			      		return FALSE;
			      	}
			      	//déconnexion
			      	mysql_close();
			      }
			      
			      //VERSION POUR GERER LES VARIABLES 'SESSION'
			      function processSESSION($_POST){
			      	$token = $_SESSION['token'];
			      	$id = $_SESSION['id'];
			      	//On se connecte d'abord à MySQL :
			      	mysql_connect("sql.free.fr", "LOGIN", "MOT_DE_PASSE");
			      	mysql_select_db("BASE_DE_DONNEES");
			      
			      	//VERIFICATION TOKEN
			      	$query = "SELECT count(*) FROM TABLE_USER WHERE id = '".$id."' AND token LIKE '".$token."'";
			      	$validation= mysql_query($query) or die (mysql_error());
			      	$valide=mysql_fetch_row($validation);
			      	if (isset($valide[0]) && $valide[0]==1) {
			      		addLogin($token, $id);
			      		return TRUE;
			      	}
			      	else {
			      		echo "Token/id non valide";
			      		echo "<br/>";
			      		return FALSE;
			      	}
			      	//déconnexion
			      	mysql_close();
			      }
			      
			      // AJOUTER L'AUTHENTIFICATION OK DANS LA SESSION PHP
			      function addSEESION($_POST) {
			          $_SESSION['token'] = $_POST['token'];
			          $_SESSION['id'] = $_POST['id'];
			      }
			      
            //ON PROCEDE A LA VERIFICATION AVANT D'AFFICHER LE CONTENU DE LA PAGE
            $displayDinner= FALSE;
            if ((isset($_SESSION['token']) && isset($_SESSION['id']) ) OR (isset($_POST['token']) && isset($_POST['id']) )) {
              if ((isset($_POST['token']) && isset($_POST['id']) )) {
                $displayDinner= processPOST($_POST); 
                addSEESION($_POST); 
              } 
              else { 
                $displayDinner= processSESSION($_SESSION); 
              }
            }
            if ($displayDinner==TRUE) {
              // LE CODE ICI N'EST AFFICHE EN PHP UNIQUEMENT SI L'AUTHENTIFICATION EST VALIDE
			?>
		<script>
		    $(function(){
			    //JE PLACE AUSSI LE JS DANS CETTE SECTION POUR NE L'AFFICHER QUE SI L'AUTHENTIFICATION EST VALIDE
			    var token = $("div#userIdentification div#token").text();
			    var id = $("div#userIdentification div#id").text();
			    //...
		</script>
		<div class="container theme-showcase" role="main">
			<div class="jumbotron">
				<center>
					<h1>EXEMPLE D'AUTHENTIFICATION (valide)</h1>
					<h3>Votre identification est valide</h3>
				</center>
			</div>
			<center>
				Cette page ne s'affiche QUE parce que votre authentification est validée !
			</center>
		</div>
		<?php
			} 
		    else {
		    // LE CODE ICI S'AFFICHE SI L'AUTHENTIFICATION EST MAUVAISE
	    ?>
		<div class="container theme-showcase" role="main">
			<div class="jumbotron">
				<center>
					<h1>EXEMPLE D'AUTHENTIFICATION (non valide)</h1>
					<h3 class="red">Vous n'avez pas le droit d'accéder à cette page !</h3>
				</center>
			</div>
			<a href="./index.php" title="Retour">
        <button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Retour
        </button>
      </a>
		</div>
		<?php
			}
			//LE CODE QUI SUIT SERA TOUJOURS VISIBLE
		?>
	</body>
	<center>&copy; Dumont Nicolas</center>
</html>

