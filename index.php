<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เชียรและแปรอักษร</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Sarabun', sans-serif;
        padding: 0;
        margin: 0;
        
    }

    form {
        border: 5px solid #ffffff;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }


    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    .page-center {
        display: flex;
        justify-content: center;
        height: 100vh;
        align-items: center;        
    }
    .bg-white{
        background-color: #EEE;
        padding: 15px;
    }
    .text-center{
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="page-center">
        <div class="bg-white" style="width: 30%;">
            <h2 class="text-center">ระบบเชียรและแปรอักษร</h2>

            <form action="php/PhpLogin.php" method="post">
                <div class="imgcontainer">
                    <img src="https://skj.ac.th/assets/img/logo/Logo-nav.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="text-center">พัฒนาโดย Dekpiano</div> 
        </div>
    </div>



</body>

</html>