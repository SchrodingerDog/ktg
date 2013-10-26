<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"></head>
</html>
<?php 
session_start();
function polaczZBaza($host, $dbname, $user, $pass){
    return $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pass);
}
function dodajPost($tytul, $tresc){
    $pdo = polaczZBaza('localhost', 'ktg', 'root', '');
    $zapytanie = $pdo->prepare('INSERT INTO posts (tytul, tresc, created) VALUES (?, ?, CURRENT_TIMESTAMP)');
    $wynik = $zapytanie->execute(array($tytul,$tresc));
    if (is_null($wynik)) {
    	echo 'Ups';
    }
}

function edytujPost($id, $tytul, $tresc){
    $pdo = polaczZBaza('localhost', 'ktg', 'root', '');
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
    $pdo = polaczZBaza('localhost', 'ktg', 'root', '');
    $zapytanie = $pdo->prepare('DELETE FROM posts WHERE id = ?');
    $wynik = $zapytanie->execute(array($id));
    if (is_null($wynik)) {
        echo 'Ups';
    }
}

function get_data($url) {
    $ch=curl_init(); //inicjalizacja
    curl_setopt($ch, CURLOPT_URL,$url); // ustaw URLa na odpowiedni adres
    $result = curl_exec($ch); // wykonaj "zapytanie" cURLa
    curl_close($ch); // zamknięcie sesji curla
    return $result;
}

function dodajCzlonka($zdjecie, $imie, $nazwisko, $opis){
    $pdo = polaczZBaza('localhost', 'ktg', 'root', '');
    if(is_uploaded_file($zdjecie['tmp_name'])){
        if ($zdjecie['size']>(1024*1024)) {
           die("Plik jest za duży");
        }
        move_uploaded_file($zdjecie['tmp_name'], 'member_photos\\'.$zdjecie['name']);

        file_get_contents('http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/generate.php?image='.$zdjecie['name'].'&dir=member_photos');
        $thumb_dir = 'member_photos\thumbs\\'.$zdjecie['name'];
        $file_dir = 'member_photos\\'.$zdjecie['name'];
    }else{
        $thumb_dir = 'member_photos\blank_user.gif';
        $file_dir = 'member_photos\blank_user.gif';
    }
    
    $login = strtolower(substr($imie, 0,3)).strtolower(substr($nazwisko, 0,3)).strlen($imie).strlen($nazwisko);
    $zapytanie = $pdo->prepare('INSERT INTO members (zdjecie, thumb, imie, nazwisko, opis, login) VALUES (?, ?, ?, ?, ?, ?)');
    $wynik = $zapytanie->execute(array($file_dir, $thumb_dir, $imie, $nazwisko, $opis, $login));
    if (is_null($wynik)) {
        echo 'Ups';
    }
}
function superUser($id){
    $pdo = polaczZBaza('localhost', 'ktg', 'root', '');
    $zapytanie = $pdo->prepare('UPDATE  `members` SET  `super_user` = 1 WHERE id =?');
    $wynik = $zapytanie->execute(array($id));
    echo 'Funkcja wykonana';
    if (is_null($wynik)) {
        echo 'Ups';
    }
}

?>