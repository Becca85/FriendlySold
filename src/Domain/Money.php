<?php
namespace FriendlySold\Domain;

/**
*
*/
class Money 
{
private $id;
private $montant;
private $payeur;
private $date;
private $group;
private $description;
}
/*ici on recupere l'id*/
public function getId(){
	return $this->id;
}
/*ici in definit ou redefinit l'id*/
public function setId($id){
	$this->id=$id;
}





/*ici on recupere montant*/
public function getMontant(){
	return $this->montant;
}
/*ici on definit ou redefinit montant*/
public function setMontant($montant){
	$this->montant=$montant;
}





/*ici on recupere payeur*/
public function getIdPayeur(){
	return $this->payeur;
}
/*ici on definit ou redefinit payeur*/
public function setIdPayeur($payeur){
	$this->payeur=$payeur;
}




/*ici on recupere date*/
public function getDate(){
	return $this->date;
}
/*ici on definit ou redefinit date*/
public function setdate($date){
	$this->date=$date;
}



/*ici on recupere group*/
public function getGroup(){
return $this->group;
}

/*ici on definit ou redefinit group*/
public function setGroup($group){
$this->group=$group;
}



/*ici on recupere description*/
public function getDescription(){
	return $this->description;
}
/*ici on definit ou redefinit description*/
public function setDescription($description){
	$this->description=$description;
}