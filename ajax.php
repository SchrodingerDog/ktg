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

if(!empty($_POST['ajax_rm_id'])){
	$id = $_POST['ajax_rm_id'];
	usunPost($id);
}

if(!empty($_POST['ajax_ed_id']) and !empty($_POST['ajax_ed_tytul']) and !empty($_POST['ajax_ed_tresc'])){
    $id = $_POST['ajax_ed_id'];
    $tytul = $_POST['ajax_ed_tytul'];
    $tresc = $_POST['ajax_ed_tresc'];
    edytujPost($id,$tytul,$tresc);
}
?>