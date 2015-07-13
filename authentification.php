<?php
    // Récupération des paramètres
    if( isset($_GET['user']) && isset($_GET['pwd']) ){
        if($_GET['user'] == $user && $_GET['pwd'] == $pwd){
          //On se connecte d'abord à MySQL :
          mysql_connect("sql.free.fr", "LOGIN", "MOT_DE_PASSE");
          mysql_select_db("BASE_DE_DONNEES");
          
          //VERIFICATION EXISTANCE DU USER : ici user est un email
          $query = "SELECT id FROM TABLE_USER WHERE password LIKE '".$pwd."' AND email LIKE '".$user."'";
          $idQuery= mysql_query($query) or die (mysql_error());
          $id=mysql_fetch_row($idQuery);
          
          if (isset($id[0])) {
            //MISE A JOUR DU TIMESTAMP - dans la table des user timestampConnexion est de type timestamp
            $query = "UPDATE TABLE_USER SET timestampConnexion=now() WHERE id='".$id[0]."'";
            $exist= mysql_query($query) or die (mysql_error());
            
            //MISE A JOUR DU TOKEN - qui servira de lien pour la suit de la navigation
            $newToken= md5(uniqid(mt_rand(), true));
            $query = "UPDATE TABLE_USER SET token='".$newToken."' WHERE id='".$id[0]."'";
            $exist= mysql_query($query) or die (mysql_error());
            
            //RECUPERATION DU NOUVEAU TOKEN ainsi que des informations de l'utilisateur
            include("JSON.php");
            $return= sql2json("SELECT firstname, lastname, token, id FROM TABLE_USER WHERE id = '".$id[0]."'");
            echo $return;
            }
            else {
              echo "Mauvaise identification";
          }
		//déconnexion
		mysql_close();
	}
	else {
		echo "PROBLEME 1 : récupération des identifiants impossible";
	}
    }
    else {
        echo "PROBLEME 2 : pas d'informations de connexion disponibles";
    }
?>
