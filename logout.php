<?php
   session_start();
   setcookie("username", $username,time()-3600);
   setcookie("password", $password,time()-3600);

   if(session_destroy()) {
      header("Location: http://localhost/Current%20Project/mahindra/index.php");
   }
?>