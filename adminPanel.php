<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"></head>
</html>
<?php
require 'admin.inc.php';
echo 'LALALALALA';
// try{
//         $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
//         echo 'Połaczono z baza';
//       }catch(PDOException $e){
//         echo 'Ups cos poszlo nie tak ';
//     }
// $member = $pdo->query('SELECT * FROM members WHERE id = 1');
//     if(!is_null($member)){
//         foreach($member->fetchAll() as $row){
//             echo '<img src="'.$row['zdjecie'].'"/>';
//         }
//     }

if(isset($_COOKIE['adminMode'])){        
    echo 'Ciasteczko istnieje<br>';
}else{
    setcookie('adminMode', ' ');
}

if(isset($_COOKIE['adminMode']) and $_COOKIE['adminMode']==' checked'){
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

if (!empty($_POST['imie']) and !empty($_POST['nazwisko']) and !empty($_POST['opis'])) {
    $zdjecie = $_FILES['zdjecie'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $opis = $_POST['opis'];
    dodajCzlonka($zdjecie, $imie, $nazwisko, $opis);

}

?>

<form action = 'adminPanel.php' method="POST" ENCTYPE="multipart/form-data">

Tytul postu:                <input type="text" name="tytul"><br>

Tresc postu:                <textarea name="tresc"></textarea><br>
<hr>
                            <input type="checkbox" name="adminMode" id="checkbox"
                            <?php
                                if (isset($_COOKIE['adminMode'])) {
                                    echo $_COOKIE['adminMode'];
                                }
                            ?> 
                            />

                            <label for="checkbox"> Wlacz tryb Admina<br></label>
<hr>
ID postu do edycji (*):     <input type="text" name="id_edycja"><br>
Tytul postu do edycji(pusty jesli ma zostac bez zmian): 
                            <input type="text" name="tytul_edycja"><br>
Tresc postu do edycji(pusty jesli ma zostac bez zmian): 
                            <input type="text" name="tresc_edycja"><br>
<hr>
ID postu do usuniecia (*):  <input type="text" name="id_usun"><br>
UWAGA! Nie ma potwierdzenia i backupu, wiec trzeba uwazac!
<hr>
Dodaj czlonka kola:<br>
Zdjecie(max 1 MB):          <input type="file" name="zdjecie"><br>
Imie:                       <input type="text" name="imie"><br>
Nazwisko:                   <input type="text" name="nazwisko"><br>
Krotki opis:                <textarea name="opis"></textarea><br>
<hr>
                            <input type="submit" value="Submit">
</form>
