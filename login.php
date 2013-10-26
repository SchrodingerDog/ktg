<?php 
ob_start();
session_start();

if(!empty($_POST['login']) and !empty($_POST['password'])){
	echo 'Logowanie';
	$login = $_POST['login'];
	$password = $_POST['password'];
	loguj($login, $password);
}
function loguj($login, $password){
	try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        echo 'Połaczono z baza';
      }catch(PDOException $e){
        echo 'Ups cos poszlo nie tak ';
    }
    $members = $pdo->prepare('SELECT * FROM members WHERE login = ?');
    $members->execute(array($login));
    $row = $members->fetchAll(PDO::FETCH_ASSOC);
    print_r($row);
    if(is_null($row)&&empty($row)){
    	echo "Coś poszło nie tak";
    }else{
    	if ($password == '11a23b58c13d') {
    	   if($row[0]['super_user']==1){
                $_SESSION['login'] = $login;
                header('Location: index.php');
                break;
	       }else{
	           echo 'Tylko uzytkownik poziomu super moze sie logowac';
	       }
    	}else{
    		echo 'Nieprawidłowe hasło';
    	}
    }
}


?>
<form action = 'login.php' method="POST" ENCTYPE="multipart/form-data">
	<input type="text" name="login">
	<input type="password" name="password">
	<input type="submit">
</form>