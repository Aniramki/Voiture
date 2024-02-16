
<?php
require_once "../Voiture/Voiture.php";
$vehicule = new Voiture("AA666SS", "blanc",1000, 250, 30, 5);
$vehicule->setAssure(true);


if (isset($_GET['action']) && !empty($_GET['saisiValeurPeinture'] || $_GET['saisiValeurCarburant'] ||( $_GET['saisiValeurVitess'] && $_GET['saisiValeurDistance'] ))) {
  $action = $_GET['action'];
  if ($action === "Peinture") {
      $peinture=$_GET['saisiValeurPeinture'];
      $vehicule->repeindre($peinture,false);
  }else if ($action === "Faire le plein") {
      $carburant=$_GET['saisiValeurCarburant'];
      $vehicule->mettre_essence($carburant);
  }else if ($action === "Se deplacer") {
      $carburant=$_GET['saisiValeurCarburant'];
      $vitesse = $_GET['saisiValeurVitess'];
      $distance = $_GET['saisiValeurDistance'];
      $vehicule->mettre_essence($carburant);
      $vehicule->se_deplacer($vitesse, $distance, $carburant=0);
  }
  
  $message=$vehicule->getMessage();
  
?>
<h1> <?= $message ?></h1>

<h1><a href="../Voiture/classes/Index.php">Au menu...</a></h1>
<?php
  echo $vehicule->__toString();
} else {
  
?>
  <h1><a href="../Voiture/classes/Index.php">Au menu...</a></h1>
<?php 
}
?>
