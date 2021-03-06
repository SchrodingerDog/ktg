<?php
require 'admin.inc.php';

if(!empty($_POST['ajax_id']) and !empty($_POST['ajax_table'])){
    $id = $_POST['ajax_id'];
    $table = $_POST['ajax_table'];
    $data = (getDataByID($table, '*', $id));
    echo json_encode($data);
    $tytul = $data[0]['tytul'];
    $tresc = $data[0]['tresc'];
}

if(!empty($_POST['ajax_rm_p_id'])){
	$id = $_POST['ajax_rm_p_id'];
	usunPost($id);
}

if(!empty($_POST['ajax_rm_m_id'])){
    $id = $_POST['ajax_rm_m_id'];
    usunCzlonka($id);
}

if(!empty($_POST['ajax_ed_p_id']) and !empty($_POST['ajax_ed_tytul']) and !empty($_POST['ajax_ed_tresc'])){
    $id = $_POST['ajax_ed_p_id'];
    $tytul = $_POST['ajax_ed_tytul'];
    $tresc = $_POST['ajax_ed_tresc'];
    edytujPost($id,$tytul,$tresc);
}

if(!empty($_POST['ajax_ed_m_id']) and !empty($_POST['ajax_ed_m_imie']) and !empty($_POST['ajax_ed_m_nazwisko']) and !empty($_POST['ajax_ed_m_opis'])){
    $id = $_POST['ajax_ed_m_id'];
    $imie = $_POST['ajax_ed_m_imie'];
    $nazwisko = $_POST['ajax_ed_m_nazwisko'];
    $opis = $_POST['ajax_ed_m_opis'];
    edytujCzlonka($id,'',$imie,$nazwisko, $opis);
}

if (!empty($_POST['ajax_order'])) {
    require 'dbConn.inc.php';
    $order = $_POST['ajax_order'];
    foreach ($order as $key => $value) {
        $key = intval( $key ) + 1;
        $query=$pdo->prepare('UPDATE `members` SET `ord` = ? WHERE id = ?');
        $query->execute(array($key, $value));
    }
}

?>