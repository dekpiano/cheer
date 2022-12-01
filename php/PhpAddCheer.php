<?php 
//print_r($_POST['val']);
include('../php/connect.php');


$val = implode('|',$_POST['val']);
$exp = explode('|',$val);

$sql_select = "SELECT * FROM tb_changeletters where chang_nameimg = '".$_POST['chang_nameimg']."' AND change_keyrow = '".$exp[0]."'";
$result = $conn->query($sql_select);
if($result->num_rows == 1){    
    $sql_update = "UPDATE tb_changeletters SET change_value='$val',change_tbrow = '".$_POST['range_row']."',change_tbcolumn ='".$_POST['range_column']."' WHERE change_keyrow='".$exp[0]."' AND chang_nameimg= '".$_POST['chang_nameimg']."'";
    if ($conn->query($sql_update) === TRUE) {
        $sql_id = "SELECT change_key FROM tb_changeletters where chang_nameimg = '".$_POST['chang_nameimg']."' GROUP BY change_key";
        $result_id = $conn->query($sql_id);
        $row = $result_id->fetch_assoc();
        echo $row['change_key'];
      } else {
        echo "Error updating record: " . $conn->error;
      }
}else{

$sql = "INSERT INTO tb_changeletters (change_key,chang_nameimg,change_keyrow, change_tbrow, change_tbcolumn,change_value)
VALUES ('".$_POST['randomkey']."','".$_POST['chang_nameimg']."','$exp[0]','".$_POST['range_row']."', '".$_POST['range_column']."','$val')";
    if ($conn->query($sql) === TRUE) {
    echo $_POST['randomkey'];
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();


//echo implode(',',$_POST['val']);

// $exp = explode('|',$val);
// echo $exp[0];
?>