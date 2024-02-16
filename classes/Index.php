<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <form id="messagerie"  action="../Vehicule.php" method="get">
        <div>
            <label for="selectAction">Selectez votre action</label>
            <select name="action" id="selectAction" onchange="choisirAction()">
            <option value="">--Select ici votre action--</option>
            <option  value="Peinture">Peinture</option>
            <option value="Faire le plein">Remplissage</option>
            <option value="Se deplacer">Deplacement</option>
  
</select>
</div>
<div id="peinturInput" >
<label for="saisiValeurPeinture">Tapez votre couleur de peinture</label>
<input type="text" name="saisiValeurPeinture" >
</div>

<div id="carburuntInput" >
<label for="saisiValeurCarburant">Tapez votre quantité de carburant</label>
<input type="number" name="saisiValeurCarburant" >
</div>

<div id="vitessInput" >
<label for="saisiValeurVitess">Tapez votre vitesse</label>
<input type="number" name="saisiValeurVitess" >
</div>

<div id="distanceInput" >
<label for="saisiValeurDistance">Tapez votre distance</label>
<input type="number" name="saisiValeurDistance" >
</div>
<div>
            <button type="reset">Recommencer</button> <button type="submit">Envoyer</button>
        </div>   
    </form>
</body>
</html>

