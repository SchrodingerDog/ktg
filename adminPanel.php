<?php 



if (!empty($_POST['tresc']) and !empty($_POST['tytul'])) {
	$tytul = $_POST['tytul'];
	$tresc = $_POST['tresc'];



	dodajPost($tytul, $tresc);
}

function dodajPost($tytul, $tresc){
	try{
        $pdo = new PDO('mysql:host=mysql1.ugu.pl;dbname=db654524;charset=utf8', 'db654524', 'balbinka3');
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

?>

<form action = 'adminPanel.php' method="POST">
Tytul postu: <input type="text" name="tytul"><br>
Tresc postu: <textarea name="tresc"></textarea><br>
<input type="submit" value="Submit">
</form>