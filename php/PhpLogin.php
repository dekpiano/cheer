<?php 
//print_r($_POST['val']);
include('../php/connect.php');


if (!empty($_POST['username']) && !empty($_POST['password'])) {
  if($_POST['username'] == 'cheer' &&   $_POST['password'] == 'cheer1234'){
    $_SESSION['Username'] = 'Admin';
    echo 'ยินดีต้อนรับผู้ทำเชียรและแปรอักษร สกจ.';
    header('Refresh: 2; URL = ../pagework.php');
  }else{
    $msg = 'Wrong username or password';
    echo "ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง";
    header('Refresh: 2; URL = ../index.php');
  }
}


$conn->close();
?>