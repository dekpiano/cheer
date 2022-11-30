<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เชียรและแปรอักษร</title>
    <link rel="stylesheet" href="css.css?v=1">
</head>

<body style="width: fit-content;">

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
    <div class="width-10 d-flex align-items-center">
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
            <input type="file" name="imgInp" id="imgInp">
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <table class="second">
                <tr>
                    <td num="1" bgcolor="#ffffff">1</td>
                    <td class="text-white" num="2" bgcolor="#e0a666">2</td>
                    <td class="text-white" num="3" bgcolor="#da9550">3</td>
                    <td class="text-white" num="4" bgcolor="#dfcf00">4</td>
                    <td class="text-white" num="5" bgcolor="#d8761f">5</td>
                    <td class="text-white" num="6" bgcolor="#d86922">6</td>
                    <td class="text-white" num="7" bgcolor="#da401e">7</td>
                    <td class="text-white" num="8" bgcolor="#af001d">8</td>
                    <td class="text-white" num="9" bgcolor="#da8976">9</td>
                    <td class="text-white" num="10" bgcolor="#d77987">10</td>
                    <td class="text-white" num="11" bgcolor="#ce3f5b">11</td>
                    <td class="text-white" num="12" bgcolor="#b93797">12</td>
                    <td class="text-white" num="13" bgcolor="#701c60">13</td>
                    <td class="text-white" num="14" bgcolor="#4e0e64">14</td>
                    <td class="text-white" num="15" bgcolor="#79b601">15</td>
                    <td class="text-white" num="16" bgcolor="#296a48">16</td>
                    <td class="text-white" num="17" bgcolor="#232d22">17</td>
                    <td class="text-white" num="18" bgcolor="#88c7b2">18</td>
                    <td class="text-white" num="19" bgcolor="#0caaae">19</td>
                    <td class="text-white" num="20" bgcolor="#016c91">20</td>
                    <td class="text-white" num="21" bgcolor="#141a30">21</td>
                    <td class="text-white" num="22" bgcolor="#a15227">22</td>
                    <td class="text-white" num="23" bgcolor="#3d1a14">23</td>
                    <td class="text-white" num="24" bgcolor="#35221F">24</td>
                    <td class="text-white" num="25" bgcolor="#7a7a7a">25</td>
                    <td class="text-white" num="26" bgcolor="#725828">26</td>
                    <td class="text-white" num="27" bgcolor="#cac29b">27</td>
                    <td class="text-white" num="28" bgcolor="#837363">28</td>
                    <td class="text-white" num="29" bgcolor="#525051">29</td>
                    <td class="text-white" num="30" bgcolor="#1d1d1d">30</td>
                </tr>
            </table>
            <button id=clear class="button">Clear</button>

            <button id="save" class="button button2">บันทึก</button>
        </div>

    </div>





    <?php
    $ch = array();
    for ($i=65; $i <=83; $i++) { 
        $ch[] =  chr($i); 
    }

    //print_r($ch);
    ?>

    <!-- style=" background-image: url(img/lovepik.png);" -->
    <form id="form_cheer" method="post">
        <table class="first">
            <tr>
                <?php $colum = $Col; $row = $Row; ?>
                <?php for ($i=0; $i <= $colum ; $i++) :?>
                <th colspan="<?=$i==0?"1":"6"?>" style="background-color: #ffffff;"><?=$i;?></th>
                <?php endfor; ?>
            </tr>

            <?php $count = 0;   for ($j=0; $j < $row*5; $j++): ?>

            <?php if($j%5 == 0) : $count++; ?>
            <tr style="border: solid 2px #000">
                <th class="row_value body" style="background-color: #ffffff;" rowspan="6"><?=$ch[$count-1];?></th>
            </tr>
            <?php endif; ?>
            <tr KeyRow="<?=$ch[$count-1];?><?=(int)$j?>" class="row_value">
                <?php for ($i=1; $i <= $colum*6 ; $i++) :?>
                <td <?=($i%6)==0?'style="border-right: 2px solid #000 !important;"':""?>
                    class="check_num_<?=$j;?> body">
                </td>
                <?php endfor; ?>
                <!-- style="border-right:2px solid #f00;" -->
            </tr>
            <?php endfor; ?>

        </table>
    </form>




</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="cheer.js?v=6"></script>

</html>