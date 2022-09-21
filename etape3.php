<?php require 'header.php'; ?>

<div class="mt-5 ms-5">Choisir une table de multiplication à tester</div>
<form class="mt-0 ms-5" action="etape3.php" method="get">
    <SELECT name="table" id="table">
        <OPTION value="0">0</OPTION>
        <OPTION value="1">1</OPTION>
        <OPTION value="2">2</OPTION>
        <OPTION value="3">3</OPTION>
        <OPTION value="4">4</OPTION>
        <OPTION value="5">5</OPTION>
        <OPTION value="6">6</OPTION>
        <OPTION value="7">7</OPTION>
        <OPTION value="8">8</OPTION>
        <OPTION value="9">9</OPTION>
        <OPTION value="10">10</OPTION>
    </SELECT>
    <INPUT type="submit" value="Envoyer" name="envoyer" class="ms-1 btn btn-primary">
</form>

<div class="mt-5 ms-5">
<?php 





if(isset($_GET['table'])){
    $hasard=rand(0,10); //choix au hasard du multiple
    $resultat = ($_GET['table'])*$hasard; //calcul du résultat senser trouvé
    echo "Combien font " . $_GET['table'] . " x " . $hasard . " ?";
    echo '<form action="etape3.php" method="get">';
    echo '<input type="hidden" name="resultat" value="' . $resultat . '">'; //variable suivi au prochain envoi
    echo '<input type="hidden" name="table" value="' . $_GET['table'] . '">'; //valeur suivi au prochain envoi
    echo '<input type="text" name="test" placeholder="Entrer le résultat"></input>';
    echo '<INPUT type="submit" value="verifier" name="verifier" class="ms-1 btn btn-primary">';
    echo '</form>';

}

// teste la valeur entré précédement au bon résultat, seulement en cas de vérification
if(isset($_GET['test']) && isset($_GET['verifier'])){
    if(($_GET['resultat']) == ($_GET['test'])){
        echo "<div class='alert alert-success'>Bonne réponse !</div>";
    }else{
        echo "<div class='alert alert-danger'>Mauvaise réponse !<br>";
        echo "La réponse était: " . $_GET['resultat'] . "</div>"; 
    }

}

?>
</div>


<?php require 'footer.php'; ?>