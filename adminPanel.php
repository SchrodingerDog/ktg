<?php 
if(isset($_COOKIE['adminMode'])){        
    echo 'Ciasteczko istnieje<br>';
}else{
    setcookie('adminMode', ' ');
}

if(isset($_COOKIE['adminMode']) and $_COOKIE['adminMode']!=''){
    echo 'Tryb admina wlaczony<br>';
}

if (!empty($_POST['tresc']) and !empty($_POST['tytul'])) {
	$tytul = $_POST['tytul'];
	$tresc = $_POST['tresc'];

	dodajPost($tytul, $tresc);
}

if (isset($_POST['adminMode'])) {
    adminMode();
}

if (!isset($_POST['adminMode']) and isset($_COOKIE['adminMode'])) {
    setcookie('adminMode', ' ');
}

function dodajPost($tytul, $tresc){
	try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połączono z bazą';
      }catch(PDOException $e){
        echo 'Ups cos poszlo nie tak ';
    }
    $zapytanie = $pdo->prepare('INSERT INTO posts (tytul, tresc, created) VALUES (?, ?, CURRENT_TIMESTAMP)');
    $wynik = $zapytanie->execute(array($tytul,$tresc));
    if (is_null($wynik)) {
    	echo 'Ups';
    }
}

function adminMode(){
    setcookie('adminMode', ' checked', time()+600);    
    echo "wlaczono tryb Admina";

}

?>

<form action = 'adminPanel.php' method="POST">

Tytul postu: <input type="text" name="tytul"><br>

Tresc postu: <textarea name="tresc"></textarea><br>

<input type="checkbox" name="adminMode" id="checkbox"
<?php
    $_COOKIE['adminMode'];
?> 
/>

<label for="checkbox"> Wlacz tryb Admina<br></label>

<input type="submit" value="Submit">
</form>
