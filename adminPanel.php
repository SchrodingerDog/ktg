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

if (!isset($_POST['adminMode'])) {
    setcookie('adminMode', ' ');
}

if (!empty($_POST['id_edycja'])) {
    if (!empty($_POST['tytul_edycja'])) {
        if (!empty($_POST['tresc_edycja'])) {
            edytujPost($_POST['id_edycja'], $_POST['tytul_edycja'], $_POST['tresc_edycja']);    
        }else{
            edytujPost($_POST['id_edycja'], $_POST['tytul_edycja'], '');
        }
    }elseif (!empty($_POST['tresc_edycja'])) {
      edytujPost($_POST['id_edycja'], '', $_POST['tresc_edycja']);  
    }
}

if (!empty($_POST['id_usun'])) {
    usunPost($_POST['id_usun']);
}

function dodajPost($tytul, $tresc){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połaczono z baza';
      }catch(PDOException $e){
        echo 'Ups cos poszlo nie tak ';
    }
    $zapytanie = $pdo->prepare('INSERT INTO posts (tytul, tresc, created) VALUES (?, ?, CURRENT_TIMESTAMP)');
    $wynik = $zapytanie->execute(array($tytul,$tresc));
    if (is_null($wynik)) {
    	echo 'Ups';
    }
}

function edytujPost($id, $tytul, $tresc){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połaczono z baza';
      }catch(PDOException $e){
        echo 'Ups cos poszlo nie tak ';
    }
    if ($tytul == '') {
        $zapytanie = $pdo->prepare('UPDATE posts SET tresc = ? WHERE id=?');
    }elseif ($tresc == '') {
        $zapytanie = $pdo->prepare('UPDATE posts SET tytul=? WHERE id=?');   
    }else{
        $zapytanie = $pdo->prepare('UPDATE posts SET tytul=? tresc = ? WHERE id=?');    
    }
    
    if ($tytul == '') {
        $wynik = $zapytanie->execute(array($tresc,$id));
    }elseif ($tresc == '') {
        $wynik = $zapytanie->execute(array($tytul,$id));   
    }else{
        $wynik = $zapytanie->execute(array($tytul,$tresc,$id));    
    }

    if (is_null($wynik)) {
        echo 'Ups';
    }   
}

function usunPost($id){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połaczono z baza';
      }catch(PDOException $e){
        echo 'Ups cos poszlo nie tak ';
    }
    $zapytanie = $pdo->prepare('DELETE FROM posts WHERE id = ?');
    $wynik = $zapytanie->execute(array($id));
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
<hr>
<input type="checkbox" name="adminMode" id="checkbox"
<?php
    echo $_COOKIE['adminMode'];
?> 
/>

<label for="checkbox"> Wlacz tryb Admina<br></label>
<hr>
ID postu do edycji (*): <input type="text" name="id_edycja"><br>
Tytul postu do edycji(pusty jesli ma zostac bez zmian): <input type="text" name="tytul_edycja"><br>
Tresc postu do edycji(pusty jesli ma zostac bez zmian): <input type="text" name="tresc_edycja"><br>
<hr>
ID postu do usuniecia (*): <input type="text" name="id_usun"><br>
UWAGA! Nie ma potwierdzenia i backupu, wiec trzeba uwazac!
<hr>
<input type="submit" value="Submit">
</form>
