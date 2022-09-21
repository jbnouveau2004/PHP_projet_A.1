<?php require 'header.php'; ?>

<div class="mt-5 ms-5">Choisir une ou plusieurs tables de multiplication</div>
<form class="mt-5 ms-5" action="etape2.php" method="get">

<input type="checkbox" name="0" value="0" class=""><label for="0">0</label>
<input type="checkbox" name="1" value="1" class="ms-3"><label for="1">1</label>
<input type="checkbox" name="2" value="2" class="ms-3"><label for="2">2</label>
<input type="checkbox" name="3" value="3" class="ms-3"><label for="3">3</label>
<input type="checkbox" name="4" value="4" class="ms-3"><label for="4">4</label>
<input type="checkbox" name="5" value="5" class="ms-3"><label for="5">5</label>
<input type="checkbox" name="6" value="6" class="ms-3"><label for="6">6</label>
<input type="checkbox" name="7" value="7" class="ms-3"><label for="7">7</label>
<input type="checkbox" name="8" value="8" class="ms-3"><label for="8">8</label>
<input type="checkbox" name="9" value="9" class="ms-3"><label for="9">9</label>
<input type="checkbox" name="10" value="10" class="ms-3"><label for="10">10</label>



<INPUT type="submit" value="Envoyer" id="envoyer" name="envoyer" class="btn btn-primary">
</form>

<div class="mt-5 ms-5">
<?php 

// si apuis du bouton envoyer
if(isset($_GET['envoyer'])){
    for($j=0;$j<=10;$j++){
        for($i=0;$i<=10;$i++){
        if(isset($_GET[$j])){ // test sur chaque chiffre de 0 à 10 si coché
                $resultat = $j*$i;
                echo $j . " x" . $i . " = " . $resultat . "<br>"; //chaque ligne
                if($i==10){echo "<hr>";} // chaque table
                }
        }
    }
}

?>
</div>


<?php require 'footer.php'; ?>