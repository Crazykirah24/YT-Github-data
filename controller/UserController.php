<?php 
require 'models/user.php';

class UserController{

	// Fonction enregistrement
	public function enregistrement(){
		$matricule = "";
		$nom = "";
		$prenom = "";
		$login = "";
		$mdp = "";
		$telephone = "";
		$nomUtilisateur = "";
		// Instanciation de la classe
		$user = new usermodel();

		if (isset($_POST['btn-ajouter'])) {
			// code...
			$user->matricule = $_POST['sai_matricule'];
			$user->nom = $_POST['sai_nom'];
			$user->prenom = $_POST['sai_prenom'];
			$user->login = $_POST['sai_login'];
			$user->mdp = $_POST['sai_mdp'];
			$user->telephone = $_POST['sai_telephone'];
			$user->nomUtilisateur = $_POST['sai_user'];
			$sol = $user->AjouterUser();

			if ($sol==true) {
				// code...
				echo "succès";
			}else{
				echo "error";
			}
		}

			if (isset($_POST['btn-modifier'])) {
			// code...
			$user->matricule = $_POST['sai_matricule'];
			$user->nom = $_POST['sai_nom'];
			$user->prenom = $_POST['sai_prenom'];
			$user->login = $_POST['sai_login'];
			$user->mdp = $_POST['sai_mdp'];
			$user->telephone = $_POST['sai_telephone'];
			$user->nomUtilisateur = $_POST['sai_user'];
			$sol = $user->ModifierUser();

			if ($sol==true) {
				// code...
				echo "succès";
			}else{
				echo "error";
			}
		}

			if (isset($_POST['btn-supprimer'])) {
			// code...
			$user->matricule = $_POST['sai_matricule'];
			$user->nom = $_POST['sai_nom'];
			$user->prenom = $_POST['sai_prenom'];
			$user->login = $_POST['sai_login'];
			$user->mdp = $_POST['sai_mdp'];
			$user->telephone = $_POST['sai_telephone'];
			$user->nomUtilisateur = $_POST['sai_user'];
			$sol = $user->SupprimerUser();

			if ($sol==true) {
				// code...
				echo "succès";
			}else{
				echo "error";
			}
		}

		if (isset($_POST['btn-rechercher'])){
			// code...
			$sol = $user->RechercherUser($_POST['sai_rechercher']);

			if (!empty($sol)){
				// code..
				$matricule = $sol[0]['matricule'];
				$nom = $sol[0]['nom'];
				$prenom = $sol[0]['prenom'];
				$login = $sol[0]['login'];
				$mdp = $sol[0]['mdp'];
				$telephone = $sol[0]['telephone'];
				$nomUtilisateur = $sol[0]['nomUtilisateur'];
			}else{
				echo "error";
			}
		}

		include "views/user/enregistrement-user.php";	
}
}

 ?>