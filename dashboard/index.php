<?
    session_start();	
    if($_SESSION['login'] == "" || $_SESSION['verified'] == 0 ){
        header('Location: ../index.php' );
    }
require($_SERVER['DOCUMENT_ROOT'].'/dashboard/index.html');
?>
