<?php 
include('php/connect.php'); 

if(!@$_SESSION['Username']){
    echo "คุณไม่มีสิทธิ์ใช้ระบบนี้";
    header('Refresh: 2; URL = index.php');
    exit();
}

$sel = "SELECT change_key,chang_nameimg,change_tbrow,change_tbcolumn FROM tb_changeletters GROUP BY change_key ORDER BY change_key";
$result = $conn->query($sel);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>หน้าแรก</title>
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <section>
        <div class="row">
            <h2 class="section-heading" style="margin: 50px 10px;">หน้างาน</h2>
        </div>
        <div class="row">
            <?php 
                while($row = $result->fetch_assoc()):
            ?>
            <div class="column">
                <a href="systercheer.php?Col=<?=$row['change_tbrow']?>&Row=<?=$row['change_tbcolumn']?>&change_key=<?=$row['change_key']?>">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <h3><?=$row['chang_nameimg']?></h3>
                        <p>
                            Lorem ipsum dolor
                        </p>
                    </div>
                </a>
            </div>

            <?php endwhile; ?>


            <div class="column">

                <div class="card">
                <a href="systercheer.php?Col=1&Row=1&IdImg=0">
                    <div class="icon-wrapper" style="margin-top: 50px;">
                        +
                    </div>
                    <h3>เพิ่มงานใหม่</h3>
                </a>

                </div>
            </div>

        </div>
    </section>
</body>

</html>