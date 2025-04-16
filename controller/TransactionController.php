<?php 
require 'models/transaction.php';

class TransactionController{
	
	public function transfert(){

		// instanciation de la  class model
		$transaction = new transactionmodel();

		if (isset($_POST['btn-valider'])) {
	 	// recherche de l'existence de la transaction
	 	$transaction->code = $_POST['sai_code'];
	 	$solTrans = $transaction->RechTransaction();
	 	if (empty($solTrans)) {
	 		
	 		// verification de l'existence de l'expediteur
	 		$transaction->expediteur = $_POST['sai_expediteur'];
	 		$solExp = $transaction->Expediteur();
	 		if (!empty($solExp)) {

	 			// verification de l'existence du destinataire
	 			$transaction->destinataire = $_POST['sai_destinataire'];
	 			$solDes = $transaction->Destinataire();
	 			if (!empty($solDes)) {

	 				// verification du solde
	 				if ($_POST['sai_montant'] <= $solExp[0]['solde']){
						// ajout de la transaction
						$type = 'Transfert';
						$date = date('Y-m-d');
						$heure = date('H:i:s');
						$etat = 'succès';

						$transaction->code = $_POST['sai_code'];
						$transaction->date = $date;
						$transaction->heure = $heure;
						$transaction->montant = $_POST['sai_montant'];
						$transaction->expediteur =  $_POST['sai_expediteur'];
						$transaction->destinataire =  $_POST['sai_destinataire'];
						$transaction->type = $type;
						$transaction->etat = $etat;
						$sol = $transaction->AjouterTransaction();

						if ($sol==true) {
							try {
								// Transfert de compte à compte
								$transaction->TransfertCompteVersCompte($_POST['sai_expediteur'], $_POST['sai_destinataire'], $_POST['sai_montant']);

								echo "Succès";

							}catch (Exception $e) {
							
								echo "Echec";
							}

						}else{
							echo "Echec de la transaction";
						}

	 				}else{
						echo "Solde insuffisant";
					}
	 			}else{
						echo "Compte destinataire inexistent";
					}

	 		}else{
					echo "Compte expediteur inexistent";
				}

	 	}else{
				echo "Transaction existente";
			}
	}
		include 'views/transaction/enregistrement-transaction.php'; 
	}
}

 ?>