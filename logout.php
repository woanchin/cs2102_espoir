<?PHP
session_start();
//Destroy Session
session_destroy();
header( 'Location:index.php' ) ;
?>