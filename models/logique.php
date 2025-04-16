<?php 
class logiquemodel{
	public $id;
	public $nom;
	public $extension;
	public $taille;
	public $temporaire;
	public $erreur;
	public $piece_jointe;

	public $con;

	// Constructeur
	function __construct(){
	$this->con = new PDO('mysql:host=localhost;dbname=demo','root', '');
	}

	// Methode
	public function Ajoutermedia(){
		$req = $this->con->prepare("INSERT INTO logique VALUES(:id, :nom, :extension, :taille, :temporaire, :erreur, :piece_jointe)");
		$req->Bindparam(":id",$this->id);
		$req->Bindparam(":nom",$this->nom);
		$req->Bindparam(":extension",$this->extension);
		$req->Bindparam(":taille",$this->taille);
		$req->Bindparam(":temporaire",$this->temporaire);
		$req->Bindparam(":erreur",$this->erreur);
		$req->Bindparam(":piece_jointe",$this->piece_jointe);
		$sol = $req->execute();
		return $sol;
	}

	public function ListeMedia(){
		$req = $this->con->prepare("SELECT * FROM logique");
		$req->execute();
		$logique = $req->fetchAll();
		return $logique;
	}

	public function ModifierMedia(){
		$req = $this->con->prepare("UPDATE logique SET nom=:nom, extension=:extension, taille=:taille, temporaire=:temporaire, erreur=:erreur, piece_jointe=:piece_jointe WHERE id=:id");
		$req->BindParam(":id",$this->id);
		$req->BindParam(":nom",$this->nom);
		$req->BindParam(":extension",$this->extension);
		$req->BindParam(":taille",$this->taille);
		$req->BindParam(":temporaire",$this->temporaire);
		$req->BindParam(":erreur",$this->erreur);
		$req->BindParam(":piece_jointe",$this->piece_jointe);
		$sol = $req->execute();
		return $sol;
	}

	public function SupprimerMedia(){
		$req = $this->con->prepare("DELETE FROM logique WHERE id=:id");
		$req->BindParam(":id",$this->id);
		$sol = $req->execute();
		return $sol;
	}

	public function RechercherMedia($rech){
		$req = $this->con->prepare("SELECT * FROM logique WHERE id=:rech");
		$req->BindParam(":rech",$rech);
		$req->execute();
		$sol = $req->fetchAll();
		return $sol;
	} 

	public function Liste(){
		$req = $this->con->prepare("SELECT * FROM logique");
		$req->execute();
		$sol = $req->fetchAll();
		return $sol;
	} 
	
}

 ?>