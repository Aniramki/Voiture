<?php

class Voiture
{
    /**
     * action
     *
     * @var string $immatriculation 
     */
private $immatriculation;

/**
 * Couleur de voiture
 * @var string $couleur
 */
private $couleur;
 /**
  * Poids de voitures
  *
  * @var int $poids
  */
private $poids;

/**
 * Puissance de voiture
 *
 * @var [int] $puissance
 */
 private $puissance;

/**
 * Capacité du réservoir
 *
 * @var [  float] $capacite
 */
 private $capacite;

 /**
  * Niveau d’essence
  *
  * @var [float] $niveauEssence
  */
 private $niveauEssence; 

/**
 * Nombre de place
 *
 * @var [int] $nombrePlace
 */
 private $nombrePlace;

 /**
  * Assuré 
  *
  * @var [boolean] $assure
  */
 private $assure;

/**
 *  Message au tableau de bord
 *
 * @var [string] $message
 */
 private $message;


public function __construct(
    string $immatriculationConstr, string $couleurConstr, int $poidsConstr, int $puissanceConstr, float $capaciteConstr, int $nombrePlaceConstr, float $niveauEssenceConstr=5, bool $assureConstr=false, string $messageConstr="Bienvenue"
    )
{
    
    $this->immatriculation = $immatriculationConstr;
    $this->poids = $poidsConstr;
    $this->puissance = $puissanceConstr;
    $this->capacite = $capaciteConstr;
    $this->nombrePlace = $nombrePlaceConstr;
    $this->couleur = $couleurConstr;
    $this->niveauEssence = $niveauEssenceConstr;
    $this->assure = $assureConstr;
    $this->message = $messageConstr;

}


public function repeindre($changeCouleur,$vernis=true)
{
    if ($changeCouleur === $this->couleur)
     {
        $this->message  = "Merci pour ce refraîchissement";
    return false;
    }
    if (!isset($changeCouleur))
    {
    return false;
    }
    if (!isset($vernis))
    {
    $vernis=true;
    }
    $this->couleur=$changeCouleur;

    $this->message = "Merci pour nouvel couleur Couleur actuelle de la voiture : " . $this->getCouleur();
    return true;
}

public function mettre_essence($carburantAjout)
{
   
    $carburantAjout = (float)$carburantAjout;
    $capaciteLibre= $this->capacite-$this->niveauEssence;
   
    if ($carburantAjout>$capaciteLibre) {
        $this->message="ATTENTION!! Vous pouvez ajouter seulement $capaciteLibre litres";
    }else{
        $encoreAjout=$capaciteLibre-$carburantAjout;
        $this->message="Vous pouvez ajouter encore $encoreAjout litres";
        $niveau=$this->niveauEssence+$carburantAjout;
        $this->setNiveauEssence($niveau);
    }

}

public function se_deplacer($vitesse, $distance, $carburantAjout) {
//     Consommation de 10 l aux 100 km en ville, soit à une vitesse moyenne inférieure à 50 
// km/h ;
//  Consommation de 5 l aux 100 km en sur route, soit à une vitesse moyenne comprise 
// entre 50 et 90 km/h ;
//  Consommation de 8 l aux 100 km en sur autoroute, soit à une vitesse moyenne 
// comprise entre 90 et 130 km/h ;
//  Consommation de 12 l aux 100 km pour une vitesse moyenne supérieure à 130 km/h (et 
// on ne parle pas des retraits de points de permis…) 
$this->mettre_essence($carburantAjout);

if ($vitesse<50) {
    $consommation = 10;
}else if ($vitesse<90) {
    $consommation= 5;
}else if ($vitesse<130) {
    $consommation=8;
}else if ($vitesse>129) {
    $consommation=12;
}
$this->consommationTotal($consommation, $distance);
}

public function consommationTotal($consommation, $distance) {
    $consommationTotal = $consommation/100*$distance;
    $remplir = $consommationTotal - $this->niveauEssence;
    if ($this->niveauEssence<$consommationTotal){
    $this->message=" ATTENTION!!! Votre Consommation est : ". $consommationTotal . ". Pour ce trajet, vous devez faire un appoint de " . $remplir . " litres";
}else{
    $remplir = $this->niveauEssence - $consommationTotal;
    $this->message="Votre Consommation est : ". $consommationTotal. " litres" . ". Votre niveau d'essence est : " . $this->niveauEssence . " litres". ". Vous pouvez faire ce trajet. Votre niveau d'essence sera " . $remplir . " litres";

}
} 

/**
 * Getter de immatriculation 
 *
 * @return string
 */
public function getImmatriculation() : string
{
    return $this->immatriculation;
}



/**
 * Getter de couleur de voiture
 *
 * @return string
 */
public function getCouleur() : string
{
    return $this->couleur;
}

/**
 * Modifie le couleur de la voiture
 *
 * @param string $couleur
 * @return self
 */
public function setCouleur(string $couleurConstr) : self
{
    $this->couleur = $couleurConstr;
    return $this;
}

/**
 * Getter de poids de la voiture
 *
 * @return integer
 */
public function getPoids() : int
{
    return $this->poids;
}

/**
 * Getter de puissance de la voiture
 *
 * @return integer $puissance
 */
public function getPuissance() : int
{
    return $this->puissance;
}

/**
 * Getter de la Capacité du réservoir de la voiture
 *
 * @return float
 */
public function getCapacite() : float
{
    return $this->capacite;
}

/**
 * Getter de Niveau d’essence
 *
 * @return float
 */
public function getNiveauEssence() : float
{
    return $this->niveauEssence;
}

/**
 * Modifie niveau d'essence
 *
 * @param float $niveauEssenceConstr
 * @return self
 */
public function setNiveauEssence(float $niveauEssenceConstr) : self
{
    $this->niveauEssence=$niveauEssenceConstr;
    return $this;
}

/**
 * Getter Nombre de place
 *
 * @return integer
 */
public function getNombrePlace() : int
{
    return $this->nombrePlace;
}

/**
 * Getter d'assurance 
 *
 * @return boolean
 */
public function getAssure() : bool
{
return $this->assure;
}

/**
 * Modifie l'assurance
 *
 * @param boolean $assureConstr
 * @return self
 */
public function setAssure(bool $assureConstr) : self
{
$this->assure=$assureConstr;
return $this;
}

/**
 * Getter de messages
 *
 * @return string
 */
public function getMessage() : string
{
    return $this->message;
}

/**
 * Modifie le message
 *
 * @param string $messageConstr
 * @return string
 */
public function setMessage(string $messageConstr) : string
{
    return $this->$messageConstr;
}

public function __toString()
{
    $messageGeneral = "Votre immatriculation est : %s, couleur de votre voitur est : %s, puissance est : %d";
    return sprintf($messageGeneral, $this->immatriculation, $this->couleur, $this->puissance);
    
}
}
?>
