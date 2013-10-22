<?php
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
    echo 'Dodaje czlonka';
    dodajCzlonka();

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

}

function dodajCzlonka(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połaczono z baza';
      }catch(PDOException $e){
        die('Ups cos poszlo nie tak ');
    }
    if(is_uploaded_file($_FILES['zdjecie']['tmp_name'])){
        copy($_FILES['zdjecie']['tmp_name'], 'member_photos\\'.$_FILES['zdjecie']['name']);
        $file_dir = 'member_photos\\'.$_FILES['zdjecie']['name'];
    }else{
        $file_dir = 'member_photos\blank_user.gif';
    }
    
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $opis = $_POST['opis'];
    $zapytanie = $pdo->prepare('INSERT INTO members (zdjecie, imie, nazwisko, opis) VALUES (?, ?, ?, ?)');
    $wynik = $zapytanie->execute(array($file_dir, $imie, $nazwisko, $opis));
    if (is_null($wynik)) {
        echo 'Ups';
    }
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
