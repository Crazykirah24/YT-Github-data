	<?php 
	require 'models/logique.php';

	class LogiqueController{

		public function enregister(){

		// Instanciation de la du model
			$media = new logiquemodel();

			$id = "";
			$nom = "";
			$extension = "";
			$piece_jointe = "";

			$ListeMedia = $media->ListeMedia();

			if (isset($_POST['btn-ajouter'])) {
				// code...
				if (!empty($_FILES['sai_fichier'])) {
				// code...
				$media->nom = $_FILES['sai_fichier']['name'];
				$media->extension = $_FILES['sai_fichier']['type'];
				$media->taille = $_FILES['sai_fichier']['size'];
				$media->temporaire = $_FILES['sai_fichier']['tmp_name'];
				$media->erreur = $_FILES['sai_fichier']['error'];
				$media->piece_jointe = file_get_contents($_FILES['sai_fichier']['tmp_name']);

				echo "succès";
				}else{
					$media = "";
					echo "error";
				}
				$media->Ajoutermedia();

				}

				if (isset($_POST['btn-modifier'])) {
				// code...
				$media->id = $_POST['sai_fichier'];
				if (!empty($_FILES['sai_fichier'])) {
					// code...
					
				$media->nom = $_FILES['sai_fichier']['name'];
				$media->extension = $_FILES['sai_fichier']['type'];
				$media->taille = $_FILES['sai_fichier']['size'];
				$media->temporaire = $_FILES['sai_fichier']['tmp_name'];
				$media->erreur = $_FILES['sai_fichier']['error'];
				$media->piece_jointe = file_get_contents($_FILES['sai_fichier']['tmp_name']);
				$sol = $media->ModifierMedia();
				if ($sol==true) {
					// code...
					echo "succès";
				}else{
					echo "error";
				}
				
			}
			}

				if (isset($_POST['btn-supprimer'])) {
				// code...
				$media->id = $_POST['sai_fichier'];
				
				$sol = $media->SupprimerMedia();
				if ($sol==true) {
					// code...
					echo "succès";
				}else{
					echo "error";
				}
			}
		
			if (isset($_POST['btn-rechercher'])){
				// code...
				$sol = $media->RechercherMedia($_POST['sai_rechercher']);
				if (!empty($sol)){
					// code..
					$id = $sol[0]['id'];
					$nom = $sol[0]['nom'];
					$extension = $sol[0]['extension'];
					$piece_jointe = $sol[0]['piece_jointe'];
				}else{
					echo "error";
				}
			}
		include "views/logique/enregistrement-logique.php";
		}

		public function Liste(){
			$piece_jointe ="";
			$liste = new logiquemodel();
			$logique = $liste->Liste();

			
			include "views/logique/ListeMedia.php";
		}
	}

	 ?>