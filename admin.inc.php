<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"></head>
</html>
<?php 
session_start();
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


function dodajCzlonka($zdjecie, $imie, $nazwisko, $opis){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połaczono z baza<br>';
      }catch(PDOException $e){
        die('Ups cos poszlo nie tak<br>');
    }
    if(is_uploaded_file($zdjecie['tmp_name'])){
        if ($zdjecie['size']>(1024*1024)) {
           die("Plik jest za duży");
        }
        move_uploaded_file($zdjecie['tmp_name'], 'member_photos\\'.$zdjecie['name']);
        $file_dir = 'member_photos\\'.$zdjecie['name'];
    }else{
        $file_dir = 'member_photos\blank_user.gif';
    }
    
    $login = strtolower(substr($imie, 0,3)).strtolower(substr($nazwisko, 0,3)).strlen($imie).strlen($nazwisko);
    $zapytanie = $pdo->prepare('INSERT INTO members (zdjecie, imie, nazwisko, opis, login) VALUES (?, ?, ?, ?, ?)');
    $wynik = $zapytanie->execute(array($file_dir, $imie, $nazwisko, $opis, $login));
    if (is_null($wynik)) {
        echo 'Ups';
    }
}
function superUser($id){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połaczono z baza<br>';
      }catch(PDOException $e){
        die('Ups cos poszlo nie tak<br>');
    }
    $zapytanie = $pdo->prepare('UPDATE  `members` SET  `super_user` = 1 WHERE id =?');
    $wynik = $zapytanie->execute(array($id));
    echo 'Funkcja wykonana';
    if (is_null($wynik)) {
        echo 'Ups';
    }
}

?>