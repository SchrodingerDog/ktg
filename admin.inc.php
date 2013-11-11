<?php 
require 'dbConn.inc.php';
require 'config.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"></head>
<?php 

global $pdo;
function dodajPost($tytul, $tresc){
    require 'dbConn.inc.php';

    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    $zapytanie = $pdo->prepare('INSERT INTO posts (tytul, tresc, created) VALUES (?, ?, CURRENT_TIMESTAMP)');
    $zapytanie->execute(array($tytul,$tresc));
}

function zamienSlashe(){
    require 'dbConn.inc.php';
	// $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
	$zapytanie= $pdo->query('SELECT * FROM members');
	foreach($zapytanie as $row){
		$zdjecie = str_replace('\\','/', $row['zdjecie']);
		$thumb = str_replace('\\','/', $row['thumb']);
		$query = $pdo->prepare('UPDATE  `members` SET  `zdjecie` = ?, `thumb` = ? WHERE id =?');
		$query->execute(array($zdjecie, $thumb, $row[id]));
	}
}

function edytujPost($id, $tytul, $tresc){
    require 'dbConn.inc.php';    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    $zapytanie = $pdo->prepare('UPDATE `posts` SET `tytul`=?, `tresc` = ? WHERE id=?');    
    $zapytanie->execute(array($tytul,$tresc,$id)); 
}

function usunPost($id){
    
    require 'dbConn.inc.php';
    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');    
    $zapytanie = $pdo->prepare('DELETE FROM posts WHERE id = ?');
    $zapytanie->execute(array($id));
}


function dodajCzlonka($zdjecie, $imie, $nazwisko, $opis){
    
    require 'dbConn.inc.php';
    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    if(is_uploaded_file($zdjecie['tmp_name'])){
        if ($zdjecie['size']>(1024*1024)) {
           die("Plik jest za duży");
        }
        move_uploaded_file($zdjecie['tmp_name'], 'member_photos/'.$zdjecie['name']);

        file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/generate.php?image='.$zdjecie['name'].'&dir=member_photos&m=120');
        $thumb_dir = 'member_photos/thumbs/'.$zdjecie['name'];
        $file_dir = 'member_photos/'.$zdjecie['name'];
    }else{
        $thumb_dir = 'member_photos/blank_user.gif';
        $file_dir = 'member_photos/blank_user.gif';
    }
    
    $login = strtolower(substr($imie, 0,3)).strtolower(substr($nazwisko, 0,3)).strlen($imie).strlen($nazwisko);
    $zapytanie = $pdo->prepare('INSERT INTO members (zdjecie, thumb, imie, nazwisko, opis, login) VALUES (?, ?, ?, ?, ?, ?)');
    $wynik = $zapytanie->execute(array($file_dir, $thumb_dir, $imie, $nazwisko, $opis, $login));
}

function edytujCzlonka($id, $zdjecie, $imie, $nazwisko, $opis){
    require 'dbConn.inc.php';
    if(is_uploaded_file($zdjecie['tmp_name'])){
        if ($zdjecie['size']>(1024*1024)) {
           die("Plik jest za duży");
        }
        move_uploaded_file($zdjecie['tmp_name'], 'member_photos/'.$zdjecie['name']);

        file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/generate.php?image='.$zdjecie['name'].'&dir=member_photos&m=120');
        $thumb_dir = 'member_photos/thumbs/'.$zdjecie['name'];
        $file_dir = 'member_photos/'.$zdjecie['name'];
    }else{
        $thumb_dir = 'member_photos/blank_user.gif';
        $file_dir = 'member_photos/blank_user.gif';
    }
    
    $login = strtolower(substr($imie, 0,3)).strtolower(substr($nazwisko, 0,3)).strlen($imie).strlen($nazwisko);

    $zapytanie = $pdo->prepare('UPDATE `members` SET `zdjecie`=?, `thumb` = ?, `imie` = ?, `nazwisko` = ?, `opis` = ?, `login` = ? WHERE id=?');    
    $zapytanie->execute(array($file_dir,$thumb_dir,$imie, $nazwisko, $opis, $login, $id)); 
}

function usunCzlonka($id){
    
    require 'dbConn.inc.php';
    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');    
    $zapytanie = $pdo->prepare('DELETE FROM `members` WHERE id = ?');
    $zapytanie->execute(array($id));
}

function dodajWyjazd($cel, $data){
    require 'dbConn.inc.php';

    $zapytanie = $pdo->prepare('INSERT INTO wyprawy (cel, data) VALUES (?, ?)');
    $zapytanie->execute(array($cel,$data));

}

function edytujWyjazd($id,$cel, $data){
    require 'dbConn.inc.php';    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    $zapytanie = $pdo->prepare('UPDATE `wyprawy` SET `cel`=?, `data` = ? WHERE id=?');    
    $zapytanie->execute(array($cel,$data,$id)); 

}

function usunWyjazd($id){
    
    require 'dbConn.inc.php';
    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');    
    $zapytanie = $pdo->prepare('DELETE FROM `wyprawy` WHERE id = ?');
    $zapytanie->execute(array($id));
}

function czlonkowieWyjazd($id, $czlonkowie){
    require 'dbConn.inc.php';
    $czlArray = explode(',', $czlonkowie);
    if (!empty($czlArray)) {
        foreach ($czlArray as $value) {
            trim($value);
            $zapytanie = $pdo->prepare('INSERT INTO wyprawy_czlonkowie (czlonek_id, wyprawa_id) VALUES (?, ?)');
            $zapytanie->execute(array($value,$id));
        }
    }
}

function dodajGalerie($id, $zdjecia){
    require 'dbConn.inc.php';
    @mkdir('galerie/'.$id.'/');
    @mkdir('galerie/'.$id.'/thumbs/');
    $ilosc = 0;
    foreach ($_FILES['galeria_wyjazd']['error'] as $i => $error) {
        if ($error == UPLOAD_ERR_OK) {
            move_uploaded_file($zdjecia['tmp_name'][$i], 'galerie/'.$id.'/'.$i.'.jpg');
            file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/generate.php?image='.$i.'.jpg&dir=galerie/'.$id.'/&m=120');
            $ilosc = $i;
        }
    }
    $ilosc++;
    $zapytanie = $pdo->prepare('INSERT INTO galeries (id, ilosc_zdj) VALUES (?, ?)');
    $zapytanie->execute(array($id,$ilosc));
}

function superUser($id){
    require 'dbConn.inc.php';
    // $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    $zapytanie = $pdo->prepare('UPDATE  `members` SET  `super_user` = 1 WHERE id =?');
    $wynik = $zapytanie->execute(array($id));
    echo 'Funkcja wykonana';
}
?>

</html>