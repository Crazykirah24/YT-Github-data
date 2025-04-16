<?php 

class usermodel{
	// Attributs
	public $matricule;
	public $nom;
	public $prenom;
	public $login;
	public $mdp;
	public $telephone;
	public $nomUtilisateur;
	
	// pour la db
	public $con;

	// Constructeur
	function __construct(){
		//Connection à la base de donnée
		$this->con = new PDO("mysql:host=localhost;dbname=demo", "root", "");
	}

	// Methodes
	public function AjouterUser(){
		$req = $this->con->prepare("INSERT INTO utilisateur VALUES(:matricule,:nom,:prenom,:login,:mdp,:telephone,:nomUtilisateur)");
		$req->BindParam(":matricule",$this->matricule);
		$req->BindParam(":nom",$this->nom);
		$req->BindParam(":prenom",$this->prenom);
		$req->BindParam(":login",$this->login);
		$req->BindParam(":mdp",$this->mdp);
		$req->BindParam(":telephone",$this->telephone);
		$req->BindParam(":nomUtilisateur",$this->nomUtilisateur);
		$sol = $req->execute();
		return $sol;
	}

	public function ModifierUser(){
		$req = $this->con->prepare("UPDATE utilisateur SET nom=:nom, prenom=:prenom, login=:login, mdp=:mdp, telephone=:telephone, nomUtilisateur=:nomUtilisateur WHERE matricule=:matricule");
		$req->BindParam(":matricule",$this->matricule);
		$req->BindParam(":nom",$this->nom);
		$req->BindParam(":prenom",$this->prenom);
		$req->BindParam(":login",$this->login);
		$req->BindParam(":mdp",$this->mdp);
		$req->BindParam(":telephone",$this->telephone);
		$req->BindParam(":nomUtilisateur",$this->nomUtilisateur);
		$sol = $req->execute();
		return $sol;
	}

	public function SupprimerUser(){
		$req = $this->con->prepare("DELETE FROM utilisateur WHERE matricule=:matricule");
		$req->BindParam(":matricule",$this->matricule);
		$sol = $req->execute();
		return $sol;
	}

	public function RechercherUser($rech){
		$req = $this->con->prepare("SELECT * FROM utilisateur WHERE matricule=:rech");
		$req->BindParam(":rech",$rech);
		$req->execute();
		$sol = $req->fetchAll();
		return $sol;
	} 

}

 ?>