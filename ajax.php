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

?>