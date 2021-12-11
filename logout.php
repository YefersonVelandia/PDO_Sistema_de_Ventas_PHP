<?php
   session_start(); //variable de sesion actual
   session_unset(); //olvidar esa sesion
   session_destroy(); //se destruye la sesion
   header("location: index.php");
?>