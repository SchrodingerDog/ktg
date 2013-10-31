<?php 
@ob_start();
@session_start();
function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}
function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

try{
        $pdo = new PDO('mysql:host=localhost;dbname=ktg;charset=utf8', 'root', '');
        // echo 'Połączono z bazą';
      }catch(PDOException $e){
        // echo 'Ups, cos poszlo nie tak ';
      }

?>