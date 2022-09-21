<?php require 'header.php'; ?>

<div class="mt-5 ms-5">Choisir une table de multiplication</div>
<form class="mt-5 ms-5" action="etape1.php" method="get">
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
    <INPUT type="submit" value="Envoyer" id="envoyer" name="envoyer" class="btn btn-primary">
</form>

<div class="mt-5 ms-5">
<?php 

// affiche la tableau de multiplication choisit si appui du bouton envoyer
if(isset($_GET['envoyer'])){
    for($i=0;$i<=10;$i++){
    $resultat = ($_GET['table'])*$i;
    echo $_GET['table'] . " x" . $i . " = " . $resultat . "<br>";
    }
}

?>
</div>


<?php require 'footer.php'; ?>