<?php 
class transactionmodel{
	// Attributs
	public $code;
	public $date;
	public $heure;
	public $montant;
	public $expediteur;
	public $destinataire;
	public $solde;
	public $type;
	public $etat;
	public $con;
	
	// constructeur	
	function __construct(){
		// connection à la base de donnée
		$this->con = new PDO("mysql:host=localhost;dbname=demo", "root", "");
	}

	// Fonction de recherche d'une transaction
	public function RechTransaction(){
		$req = $this->con->prepare("SELECT * FROM transaction WHERE code=:code");
		$req->BindParam(":code",$this->code);
		$req->execute();
		$RechTransaction = $req->fetchAll();
		return $RechTransaction;
	}

	// Fonction de verification de l'expéditeur
	public function Expediteur(){
		$req = $this->con->prepare("SELECT * FROM compte WHERE numero=:expediteur");
		$req->BindParam(":expediteur",$this->expediteur);
		$req->execute();
		$verificationExpediteur = $req->fetchAll();
		return $verificationExpediteur;
	} 

	// Fonction de verification du destinataire
	public function Destinataire(){
		$req = $this->con->prepare("SELECT * FROM compte WHERE numero=:destinataire");
		$req->BindParam(":destinataire",$this->destinataire);
		$req->execute();
		$verificationDestinataire = $req->fetchAll();
		return $verificationDestinataire;
	}

	// Fonction d'ajout de la transaction
	public function AjouterTransaction(){
		$req = $this->con->prepare("INSERT INTO transaction VALUES(:code,:date,:heure,:montant,:expediteur,:destinataire, :type, :etat)");
		$req->BindParam(":code",$this->code);
		$req->BindParam(":date",$this->date);
		$req->BindParam(":heure",$this->heure);
		$req->BindParam(":montant",$this->montant);
		$req->BindParam(":expediteur",$this->expediteur);
		$req->BindParam(":destinataire",$this->destinataire);
		$req->BindParam(":type",$this->type);
		$req->BindParam(":etat",$this->etat);
		$AjoutTransaction = $req->execute();
		return $AjoutTransaction;
	}

	// Fonction de transfert de compte à compte
	public function TransfertCompteVersCompte($expediteur,$destinataire,$montant){
        try {// essaie de l'exécution du bloc de code
		$this->con->beginTransaction();// Lancement de la transaction et désactivation de l'autocommit
		$req = $this->con->prepare("UPDATE compte SET solde=solde-:montant WHERE numero=:expediteur");
 		$req->BindParam(":expediteur",$expediteur);
		$req->BindParam(":montant",$montant);
		$req->execute();
 		$req = $this->con->prepare("UPDATE compte SET solde=solde+:montant WHERE numero=:destinataire");
 		$req->BindParam(":destinataire",$destinataire);
		$req->BindParam(":montant",$montant);
		$req->execute();

		$sol = $this->con->commit();// Validation de la transaction


		}catch (Exception $e) {// Intercepte l'erreur du bloc try et le gère
		$sol = $this->con->rollback();// Annulation de la transaction si Échec

		}
		return $sol; // Retourne le resultat obtenu
	}
}

 ?>