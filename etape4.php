<?php require 'header.php'; ?>


<div class="mt-5 ms-5">Choisir une ou plusieurs tables de multiplication à tester</div>
<form class="mt-5 ms-5" action="etape4.php" method="get">

<input type="checkbox" name="0" value="0" class=""<?php if(isset($_GET[0])){echo " checked";}?>><label for="0">0</label>
<input type="checkbox" name="1" value="1" class="ms-3"<?php if(isset($_GET[1])){echo " checked";}?>><label for="1">1</label>
<input type="checkbox" name="2" value="2" class="ms-3"<?php if(isset($_GET[2])){echo " checked";}?>><label for="2">2</label>
<input type="checkbox" name="3" value="3" class="ms-3"<?php if(isset($_GET[3])){echo " checked";}?>><label for="3">3</label>
<input type="checkbox" name="4" value="4" class="ms-3"<?php if(isset($_GET[4])){echo " checked";}?>><label for="4">4</label>
<input type="checkbox" name="5" value="5" class="ms-3"<?php if(isset($_GET[5])){echo " checked";}?>><label for="5">5</label>
<input type="checkbox" name="6" value="6" class="ms-3"<?php if(isset($_GET[6])){echo " checked";}?>><label for="6">6</label>
<input type="checkbox" name="7" value="7" class="ms-3"<?php if(isset($_GET[7])){echo " checked";}?>><label for="7">7</label>
<input type="checkbox" name="8" value="8" class="ms-3"<?php if(isset($_GET[8])){echo " checked";}?>><label for="8">8</label>
<input type="checkbox" name="9" value="9" class="ms-3"<?php if(isset($_GET[9])){echo " checked";}?>><label for="9">9</label>
<input type="checkbox" name="10" value="10" class="ms-3"<?php if(isset($_GET[10])){echo " checked";}?>><label for="10">10</label>



<INPUT type="submit" value="Envoyer" id="envoyer" name="envoyer" class="btn btn-primary">
</form>

<div class="mt-5 ms-5">
<?php 

// remise à 0 points
if(!isset($_GET['envoyer']) && !isset($_GET['verifier'])){
$fichier = fopen('points.txt', 'c+b'); // mode lecture et écriture
fseek($fichier, 0); // retourne le curseur à 0
fwrite($fichier, "0   ");
}


// test si (envoyer ou vérifier)+ au moins un chiffre choisit
if((isset($_GET['envoyer']) || isset($_GET['verifier'])) && ( (isset($_GET[0]))||(isset($_GET[1]))||(isset($_GET[2]))||(isset($_GET[3]))||(isset($_GET[4]))||(isset($_GET[5]))||(isset($_GET[6]))||(isset($_GET[7]))||(isset($_GET[8]))||(isset($_GET[9]))||(isset($_GET[10]))) ){
$hasard1=11; //déclaration d'un multiple hors zone
while(!isset($_GET[$hasard1])){ // choix au hasard de 0 à 10 tant qu'il n'a pas trouvé un des chiffres choisit 
    $hasard1=rand(0,10);
}
    $hasard2=rand(0,10); // choix d'un multiple
    $resultat = $hasard1*$hasard2;
    echo "Combien font " . $hasard1 . " x " . $hasard2 . " ?";
    echo '<form action="etape4.php" method="get">';
    echo '<input type="hidden" name="resultat" value="' . $resultat . '">';
    for($k=0;$k<=10;$k++){ // transmission du ou des chiffres choisit au nouveau formulaire
        if(isset($_GET[$k])){echo '<input type="hidden" name="' . $k . '" value="' . $k . '">';}
    }
    echo '<input type="text" name="test" placeholder="Entrer le résultat"></input>';
    echo '<INPUT type="submit" value="verifier" name="verifier" class="ms-1 btn btn-primary">';
    echo '</form>';

}
// test si un calcul a été rentré
if(isset($_GET['test']) && isset($_GET['verifier'])){
    if(($_GET['resultat']) == ($_GET['test'])){
        echo "<div class='alert alert-success'>Bonne réponse !</div>";
        $fichier = fopen('points.txt', 'c+b'); // mode lecture et écriture
        $points = fread($fichier,filesize('points.txt')); // lecture de x octet, où x est la taille du fichier en octet
        $points=(int)$points+1;
        fseek($fichier, 0); // retourne le curseur à 0
        fwrite($fichier, $points . "   "); // les espaces dans le cas on passe des dizaines aux unités

    }else{
        echo "<div class='alert alert-danger'>Mauvaise réponse !<br>";
        echo "La réponse était: " . $_GET['resultat'] . "</div>";
        $fichier = fopen('points.txt', 'c+b'); // mode lecture et écriture
        $points = fread($fichier,filesize('points.txt')); // lecture de x octet, où x est la taille du fichier en octet
        $points=(int)$points-1;
        fseek($fichier, 0); // retourne le curseur à 0
        fwrite($fichier, $points . "   "); // les espaces dans le cas on passe des dizaines aux unités

    }

}


$fichier = fopen('points.txt', 'c+b'); // mode lecture et écriture
$points = fread($fichier,filesize('points.txt')); // lecture de x octet, où x est la taille du fichier en octet
echo "<p class='mt-5'>Nombre de point: " . (int)$points . "</p>";
?>
</div>


<?php require 'footer.php'; ?>