<?php 
require 'admin.inc.php'; 
require 'dbConn.inc.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="favicon.gif">

</head>
</html>
<?php
if(!isset($_SESSION['login'])){
    echo "Nieładnie, by tu wejść trzeba się zalogować";
    exit();
}
// for ($i=0; $i < 100; $i++) { 
    // usunPost($i);
// }

// for ($i=0; $i < 5; $i++) { 
//     dodajPost('Tytul'.$i, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
// }

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

if (!empty($_POST['tresc']) and !empty($_POST['tytul'])) {
	$tytul = $_POST['tytul'];
	$tresc = $_POST['tresc'];

	dodajPost($tytul, $tresc);
}

if (!empty($_POST['id_edycja']) and !empty($_POST['tytul_edycja']) and !empty($_POST['tresc_edycja'])) {
    edytujPost($_POST['id_edycja'], $_POST['tytul_edycja'], $_POST['tresc_edycja']);  
}

if (!empty($_POST['id_usun_post'])) {
    usunPost($_POST['id_usun_post']);
}

if (!empty($_POST['imie']) and !empty($_POST['nazwisko']) and !empty($_POST['opis'])) {
    $zdjecie = $_FILES['zdjecie'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $opis = $_POST['opis'];
    dodajCzlonka($zdjecie, $imie, $nazwisko, $opis);

}

if (!empty($_POST['id_edytuj_czlonka']) and !empty($_POST['imie_edytuj']) and !empty($_POST['nazwisko_edytuj']) and !empty($_POST['opis_edytuj'])) {
    $id = $_POST['id_edytuj_czlonka'];
    $zdjecie = $_FILES['zdjecie_edytuj'];
    $imie = $_POST['imie_edytuj'];
    $nazwisko = $_POST['nazwisko_edytuj'];
    $opis = $_POST['opis_edytuj'];
    edytujCzlonka($id, $zdjecie, $imie, $nazwisko, $opis);

}

if (!empty($_POST['id_usun_czlonka'])) {
    usunCzlonka($_POST['id_usun_czlonka']);
}

if (!empty($_POST['cel']) and !empty($_POST['data'])) {
    $cel = $_POST['cel'];
    $data = $_POST['data'];

    dodajWyjazd($cel, $data);
}

if (!empty($_POST['id_edytuj_wyjazd']) and !empty($_POST['cel_edytuj']) and !empty($_POST['data_edytuj'])) {
    $id = $_POST['id_edytuj_wyjazd'];
    $cel = $_POST['cel_edytuj'];
    $data = $_POST['data_edytuj'];

    edytujWyjazd($id,$cel, $data);
}

if (!empty($_POST['id_usun_wyjazd'])) {
    usunWyjazd($_POST['id_usun_wyjazd']);
}

if (!empty($_POST['czlonkowie_wyjazd']) and !empty($_POST['id_czlonkowie_wyjazd'])) {
    czlonkowieWyjazd($_POST['id_czlonkowie_wyjazd'], $_POST['czlonkowie_wyjazd']);
}

if (!empty($_POST['id_galeria_wyjazd']) and !empty($_FILES['galeria_wyjazd'])) {
    dodajGalerie($_POST['id_galeria_wyjazd'], $_FILES['galeria_wyjazd']);
}

if(!empty($_POST['id_super'])){
    $id = $_POST['id_super'];
    superUser($id);
}

if(!empty($_POST['folder'])){
    $folder = $_POST['folder'];
    
    addMiniatures($folder);
}

//print_r(getDataByID('wyprawy', '*', 1))

?>

<form name = 'form' action = 'adminPanel.php' method="POST" enctype="multipart/form-data">
<b>Dodaj post</b><br>
Tytul postu:                <input type="text" name="tytul"/><br>

Tresc postu:                <textarea name="tresc"></textarea><br>
<hr>
<b>Dodaj czlonka kola</b><br>
Zdjecie(max 1 MB):          <input type="file" name="zdjecie"/><br>
Imie:                       <input type="text" name="imie"/><br>
Nazwisko:                   <input type="text" name="nazwisko"/><br>
Krotki opis:                <textarea name="opis"></textarea><br>
<hr>
<b>Dodaj wyjazd</b><br>
Cel:                        <input type="text" name="cel"/><br>
Data                        <input type="text" name="data"/><br>
<hr>
<b>Dodaj czlonkow do wyjazdu</b><br>
ID wyjazdu:                 <input type="text" name="id_czlonkowie_wyjazd"/><br>
Czlonkowie(id, po przecinku)<input type="text" name="czlonkowie_wyjazd"/><br>
<hr>
<b>Dodaj galerie do wyjazdu</b><br>
ID wyjazdu:                 <input type="text" name="id_galeria_wyjazd"/><br>
Zdjecia                     <input type="file" name="galeria_wyjazd[]" multiple="multiple"/><br>

<hr>
<b>Dodaj miniatury w folderze</b><br>
Folder:                 <input type="text" name="folder"/><br>


<hr>
<div class="edit post">
<b>Edytuj post</b><br>
ID postu do edycji:         <input class = "id" type="text" name="id_edycja"/><br>
Tytul postu: 
                            <input type="text" class = 'tytul' name="tytul_edycja"/><br>
Tresc postu : 
                            <textarea class = 'tresc' name="tresc_edycja"></textarea><br>
<hr>
</div>
<div class="edit member">
<b>Edytuj czlonka kola</b><br>
ID:                         <input class = "id" type="text" name="id_edytuj_czlonka"/><br>
Zdjecie(max 1 MB):          <input class="zdjecie" type="file" name="zdjecie_edytuj"/><br>
Imie:                       <input class="imie" type="text" name="imie_edytuj"/><br>
Nazwisko:                   <input class='nazwisko'type="text" name="nazwisko_edytuj"/><br>
Krotki opis:                <textarea class="opis" name="opis_edytuj"></textarea><br>
<hr>
</div>
<div class="edit wyjazd">
<b>Edytuj wyjazd</b><br>
ID:                         <input class = "id" type="text" name="id_edytuj_wyjazd"/><br>
Cel:                        <input class="cel"type="text" name="cel_edytuj"/><br>
Data                        <input class="data" type="text" name="data_edytuj"/><br>
<hr>
</div>
<div class="delete post">
<b>Usun post</b><br>
ID postu do usuniecia:      <input class = "id" type="text" name="id_usun_post"/><br>
</div>
<hr>
<div class="delete member">
<b>Usun czlonka kola</b><br>
ID czlonka do usuniecia:  <input class = "id" type="text" name="id_usun_czlonka"/><br>
<hr>
</div>
<div class="delete wyjazd">
<b>Usun wyjazd</b><br>
ID wyjazdu do usuniecia:     <input class = "id" type="text" name="id_usun_wyjazd"/><br>
<hr>
</div>



<?php if($_SESSION['login']=='kampro512'){
    echo 'Super user dla uzytkownika o ID <input type="text" name="id_super"/><br>';
    echo '<hr>';
}?>

                            <input type="submit" value="Submit">
</form>
<script language="JavaScript" type="text/javascript" src="bootstrap/assets/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="view.js"></script>
