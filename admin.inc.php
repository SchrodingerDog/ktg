<?php 
require 'config.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"></head>
<?php 

global $pdo;
function dodajPost($tytul, $tresc){

    $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    $zapytanie = $pdo->prepare('INSERT INTO posts (tytul, tresc, created) VALUES (?, ?, CURRENT_TIMESTAMP)');
    $zapytanie->execute(array($tytul,$tresc));
}

function zamienSlashe(){
	$pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
	$zapytanie= $pdo->query('SELECT * FROM members');
	foreach($zapytanie as $row){
		$zdjecie = str_replace('\\','/', $row['zdjecie']);
		$thumb = str_replace('\\','/', $row['thumb']);
		$query = $pdo->prepare('UPDATE  `members` SET  `zdjecie` = ?, `thumb` = ? WHERE id =?');
		$query->execute(array($zdjecie, $thumb, $row[id]));
	}
}

function edytujPost($id, $tytul, $tresc){
    
    $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
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
    $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');    
    $zapytanie = $pdo->prepare('DELETE FROM posts WHERE id = ?');
    $wynik = $zapytanie->execute(array($id));
    if (is_null($wynik)) {
        echo 'Ups';
    }
}


function dodajCzlonka($zdjecie, $imie, $nazwisko, $opis){
    $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    if(is_uploaded_file($zdjecie['tmp_name'])){
        if ($zdjecie['size']>(1024*1024)) {
           die("Plik jest za duży");
        }
        move_uploaded_file($zdjecie['tmp_name'], 'member_photos/'.$zdjecie['name']);

        file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/generate.php?image='.$zdjecie['name'].'&dir=member_photos');
        $thumb_dir = 'member_photos/thumbs/'.$zdjecie['name'];
        $file_dir = 'member_photos/'.$zdjecie['name'];
    }else{
        $thumb_dir = 'member_photos/blank_user.gif';
        $file_dir = 'member_photos/blank_user.gif';
    }
    
    $login = strtolower(substr($imie, 0,3)).strtolower(substr($nazwisko, 0,3)).strlen($imie).strlen($nazwisko);
    $zapytanie = $pdo->prepare('INSERT INTO members (zdjecie, thumb, imie, nazwisko, opis, login) VALUES (?, ?, ?, ?, ?, ?)');
    $wynik = $zapytanie->execute(array($file_dir, $thumb_dir, $imie, $nazwisko, $opis, $login));
    if (is_null($wynik)) {
        echo 'Ups';
    }
}



function superUser($id){
    
    $pdo = new PDO('mysql:host=localhost;dbname=ktg', 'root', '');
    $zapytanie = $pdo->prepare('UPDATE  `members` SET  `super_user` = 1 WHERE id =?');
    $wynik = $zapytanie->execute(array($id));
    echo 'Funkcja wykonana';
    if (is_null($wynik)) {
        echo 'Ups';
    }
}

?>

</html>