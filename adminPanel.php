<?php 

if (!empty($_POST['tresc']) and !empty($_POST['tytul'])) {
	$tytul = $_POST['tytul'];
	$tresc = $_POST['tresc'];

	dodajPost($tytul, $tresc);
}
if (isset($_POST['adminMode'])) {
    adminMode();
}

function dodajPost($tytul, $tresc){
	try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połączono z bazą';
      }catch(PDOException $e){
        echo 'Ups, cos poszlo nie tak ';
    }
    $zapytanie = $pdo->prepare('INSERT INTO posts (tytul, tresc, created) VALUES (?, ?, CURRENT_TIMESTAMP)');
    $wynik = $zapytanie->execute(array($tytul,$tresc));
    if (is_null($wynik)) {
    	echo 'Ups';
    }
}

function adminMode(){

    echo "wlaczono tryb Admina";

}

?>

<form action = 'adminPanel.php' method="POST">

Tytul postu: <input type="text" name="tytul"><br>

Tresc postu: <textarea name="tresc"></textarea><br>

<input type="checkbox" name="adminMode" id="checkbox" />
<label for="checkbox"> Wlacz tryb Admina<br></label>

<input type="submit" value="Submit">
</form>
