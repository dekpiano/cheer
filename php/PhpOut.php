<?php
   session_start();
   session_destroy();
   
   echo 'กำลังออกจากระบบ';
   header('Refresh: 2; URL = ../index.php');
?>