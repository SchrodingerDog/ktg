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
    $members = $pdo->query('SELECT * FROM `members`');
    // $wynik = $members->execute(array($login));
    if(is_null($members)&&empty($members)){
    	echo "Coś poszło nie tak";
    }else{
    		foreach($members->fetchAll() as $row){
    			if($row['login']==$login){
    				if ($password == '11a23b58c13d') {
    					if($row['super_user']==1){
		            		$_SESSION['login'] = $login;
		            		header('Location: index.php');
		            		break;
			            }else{
			            	echo 'Tylko uzytkownik poziomu super moze sie logowac';
			            }
    				}else{
    					echo 'Nieprawidłowe hasło';
    				}
    			}else{
    				echo 'Nie ma użytkownika o takim loginie';
    			}
    		
    		// echo $members;
	    	//
	     //        if($row['super_user']==1){
	     //        	$_SESSION['login'] = $login;
	     //        }else{
	     //        	echo 'Tylko uzytkownik poziomu super moze sie logowac';
	     //        }
	     //    }
    	}
    }
}


?>
<form action = 'login.php' method="POST" ENCTYPE="multipart/form-data">
	<input type="text" name="login">
	<input type="password" name="password">
	<input type="submit">
</form>