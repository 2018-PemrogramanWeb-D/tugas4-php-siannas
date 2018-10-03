<!DOCTYPE html>
<?php include('validation.php'); ?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>belajar PHP</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Ubuntu');  
        
        body{
            font-family: 'Ubuntu', sans-serif;
            font-size: 25px;
        }
        div, input[type="text"]{
            border-radius: 3px;
        }
        div{
            position: fixed;
            width: 500px;
            background-color: ghostwhite;
            display: inline-block;
            position: fixed;
            top: 30%;
            left: 0;
            right: 0;
            margin: auto;
            padding: 20px;
            
        }
        .shadow1{
            -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        }
        .invalid{
            font-size: 12px;
            color: red;
        }
        input[type="text"]{
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="shadow1">
        <?php if(isset($_SESSION["logged-in"])): ?>
        <p>Selamat
            <?php echo $waktu ." ". $name ?>
        </p>
        <p>Sekarang pukul
            <?php echo $jam ." ".$waktu ?>
        </p>
        <?php endif; ?>
        <form action="./validation.php" method="POST">
            <?php if(isset($_SESSION["logged-in"])): ?>
            <input type="submit" name="logout" value="log out">
            <?php else: ?>
            LOGIN<br>
            Name : <input type="text" name="name" value=<?php echo $name; ?>><br>
            <span class="invalid">
                <?php echo $errName; ?></span><br>
            Password : <input type="text" name="pass"><br>
            <span class="invalid">
                <?php echo $errPass;?></span><br>
            <input type="submit" name="login">
            <?php endif; ?>
        </form>
    </div>
</body>

</html>