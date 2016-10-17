ici question :

ici on créé nos class exemple:
dans un fichier Personnage.php
class Personnage
{
		private $id ;//ici on definit la proprieté "id" pour la base de données
		public 	$nom ;
		//son nom
		private $force  ;
		// La force du personnage, par défaut à 50.
		private $_degats;
		//les degats recu, par default a 0
  		private $_niveau;
  		//Le niveau du personnage, par default a 10
		private $_exp;        
		// Son expérience, par défaut à 1.
		private $_chiur = '10 litres de merde '; // comment il chie par default
		
		
		
			public function __construct($nom, $force) // Constructeur demandant 2 paramètres
			{
				$this->nom = $nom;
				$this->getForce($force) ; // Initialisation de la force.
				
			}
		// ici on declare un fonction pour faire parler notre personnage en affichant du text
		public function parler() {
				
			echo '<div class="col-md-6 talk"> '.$this->nom .' dit : je vais te decoupé sale heretik!'.'</div>' ;	
		}
		public function getForce($force){
			if(!is_int($force)){
				trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING) ;
				return;
				}
				if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
				{
				trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
				return;
				}
				 $this->force = $force;
				  
			}
		
		// Une méthode qui frappera un personnage (suivant la force qu'il a).
		public function frapper($jerry){ 
			$this->_degats += $this->force; 
			echo '<div class="col-md-6 hit">'.$this->nom.' frappe '. $jerry->nom.'</div>';
		}
		// UNe methode qui 
		public function afficherExperience(){
			echo '<div class="col-md-6 showexp">' .$this->nom. ' a '.$this->_exp.' dexperience'.'</div>';
		}
		
		// Une méthode augmentant l'attribut $experience du personnage.
		public function gagnerExperience() 
		{
			$this->_exp++ ;
			echo '<div class="col-md-6 2 winexp">' .$this->nom. ' a gagner '.$this->_exp. '</div>' ;
		}
		// Une méthode augmentant l'attribut $experience du personnage.
		public function PrendreDegats() 
		{
			$this->_degats = $this->_degats + 1;
			echo '<div class="col-md-6 takehit">' .$this->nom . ' a prit '.$this->_degats.' de degats'.'</div>'  ;
		}
		// Une methode qui signale au user que l'perso2 a eu peur en ce chiant dessu (on affiche un text)
		public function chier(){
			echo '<div class="col-md-6 bullshit">' .$this->nom. ' a chier '.$this->_chiur.'dessus tellement il a eu peur '.'</div>' ;
		}
		// Une méthode qui déplacera le personnage (modifiera sa localisation).
		public function deplacer(){ 
		
		}
			
}
