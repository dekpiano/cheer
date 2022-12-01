<?php 
include('php/connect.php'); 

if(!@$_SESSION['Username']){
    echo "คุณไม่มีสิทธิ์ใช้ระบบนี้";
    header('Refresh: 2; URL = index.php');
    exit();
}
$sql_nameImg = "SELECT chang_nameimg,change_key FROM tb_changeletters WHERE change_key='".@$_GET['change_key']."'  ORDER BY change_keyrow ASC";
$result_nameImg = $conn->query($sql_nameImg);
$nameImg = $result_nameImg->fetch_assoc();

$sql_sel = "SELECT change_value,chang_nameimg FROM tb_changeletters WHERE change_key='".@$_GET['change_key']."'  ORDER BY change_keyrow ASC";
$result = $conn->query($sql_sel);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เชียรและแปรอักษร</title>
    <link rel="stylesheet" href="css.css?v=6">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
</head>

<body style="width: fit-content; font-family: 'Sarabun', sans-serif;">

    <?php 
if(isset($_GET['Col'])){
    $Col = $_GET['Col'];
}else{
    $Col=1;
}

if(isset($_GET['Row'])){
    $Row = $_GET['Row'];
}else{
    $Row=1;
}
?>
    <div class="d-flex justify-content-between">
        <div>
        <a href="pagework.php">กลับหน้าแรก</a>
        </div>
        <div>
        ผู้ใช้งาน <?=$_SESSION['Username'];?> <a href="php/PhpOut.php">ออกจากระบบ</a>
        </div>
    </div>



    <hr>
    <div class="width-10 d-flex align-items-center">
        <div>
            <label for="">ชื่อรูปภาพ</label>
            <input type="text" value="<?=@$nameImg['chang_nameimg']?>" name="chang_nameimg" id="chang_nameimg" placeholder="กรุณากรอกชื่อภาพก่อนบันทึก...">
            <input type="text" value="<?=@$nameImg['change_key']?>" name="change_key" id="change_key" placeholder="กรุณากรอกชื่อภาพก่อนบันทึก..." style="display:none">
        </div>
        <div class="range-wrap">
            <label for="">คอลัม</label>
            <input type="range" class="range" name="range_column" id="range_column" value="<?=$Col?>" min="0" max="20">
            <output class="bubble"></output>
        </div>
        <div class="range-wrap">
            <label for="">แถว</label>
            <input type="range" class="range" name="range_row" id="range_row" value="<?=$Row?>" min="0" max="20">
            <output class="bubble"></output>
        </div>
        <div class="">
            <div>
            <label for="">ใส่รูปต้นแบบ</label>
            </div>
            
            <input type="file" name="imgInp" id="imgInp">
        </div>
        <button id=clear class="button">Clear</button>

        <button id="save" class="button button2">บันทึก</button>
    </div>

    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <table class="second">
                <tr>
                    <?php 
                    $sql_color = "SELECT * FROM tb_pagecolor  ORDER BY color_number ASC"; 
                    $re_Color = $conn->query($sql_color);
                    $ShowColor = [];
                    while($row = $re_Color->fetch_assoc()){
                        if($row['color_number'] == 1 ){
                            echo '<td num="1" bgcolor="#ffffff">1</td>';
                           
                        }else{
                            echo '<td class="text-white" num="'.$row['color_number'].'" bgcolor="'.$row['color_bg'].'">'.$row['color_number'].'</td>';
                           
                        }                        
                        array_push($ShowColor,$row['color_bg']);
                    }
                   // print_r($ShowColor);
                    ?>


                </tr>
            </table>

        </div>

    </div>

    <?php
    $ch = array();
    for ($i=65; $i <=83; $i++) { 
        $ch[] =  chr($i); 
    }
    ?>

    <?php $ii=0; $val = [];
                while($row = $result->fetch_assoc()):
                    $ex = explode('|',$row['change_value']);
                    $change_value = $row['change_value']; 
                    $val[$ii][$ex[0]] = $change_value;
            ?>
    <?php $ii++; endwhile; ?>
    <?php //echo '<pre>';print_r($val); ?>

    <form id="form_cheer" method="post">
        <table class="first">
            <tr>
                <?php $colum = $Col; $row = $Row; ?>
                <?php for ($i=0; $i <= $colum ; $i++) :?>
                <th colspan="<?=$i==0?"1":"6"?>" style="background-color: #ffffff;"><?=$i;?></th>
                <?php endfor; ?>
            </tr>
            <?php //while($row = $result->fetch_assoc()) { }?>
            <?php $count = 0;   for ($j=0; $j < $row*5; $j++): ?>



            <?php if($j%5 == 0) : $count++; ?>
            <tr style="border: solid 2px #000">
                <th class="row_value body" style="background-color: #ffffff;" rowspan="6"><?=$ch[$count-1];?></th>
            </tr>
            <?php endif; ?>
            <?php  $keyRow = $ch[$count-1].(int)$j;?>
            <tr KeyRow="<?=$keyRow?>" class="row_value">
                <?php for ($i=1; $i <= $colum*6 ; $i++) : ?>
                <?php $v = @explode("|",$val[$j][$keyRow]); ?>

                <td <?=($i%6)==0?'style="border-right: 2px solid #000 !important;"':""?>
                    class="check_num_<?=$j;?> body <?=@$v[$i]==1?"":"text-white"?>"
                    bgcolor="<?=@$v[$i]<=0?"":$ShowColor[@$v[$i]-1]?>">
                    <?php                     
                    echo (@$v[$i]) ;
                  // print_r($ShowColor[@$v[$i]-1]);
                    ?>
                </td>
                <?php endfor; ?>
            </tr>

            <?php endfor; ?>

        </table>
    </form>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="cheer.js?v=12"></script>

</html>