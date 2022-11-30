<?php 
//print_r($_POST['val']);
include('../php/connect.php');



$val = implode('|',$_POST['val']);
$exp = explode('|',$val);

$sql_select = "SELECT * FROM tb_changeletters where change_keyrow = '".$exp[0]."'";
$result = $conn->query($sql_select);
if($result->num_rows == 1){    
    $sql_update = "UPDATE tb_changeletters SET change_value='$val',change_tbrow = '".$_POST['range_row']."',change_tbcolumn ='".$_POST['range_column']."' WHERE change_keyrow='".$exp[0]."'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
}else{
$sql = "INSERT INTO tb_changeletters (change_img,change_keyrow, change_tbrow, change_tbcolumn,change_value)
VALUES ('img_001','$exp[0]','".$_POST['range_row']."', '".$_POST['range_column']."','$val')";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();


//echo implode(',',$_POST['val']);

// $exp = explode('|',$val);
// echo $exp[0];
?>