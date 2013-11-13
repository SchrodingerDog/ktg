<?php
require 'admin.inc.php';

if(!empty($_POST['ajax_id']) and !empty($_POST['ajax_table'])){
    $id = $_POST['ajax_id'];
    $table = $_POST['ajax_table'];
    return (getDataByID($table, '*', $id));
}

?>