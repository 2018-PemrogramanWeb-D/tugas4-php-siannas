<!DOCTYPE html>
<?php include('validation.php'); ?>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>belajar PHP</title>
</head>
<body>
    <?php if(isset($_SESSION["logged-in"])): ?>
    <h1>Selamat <?php echo $waktu ." ". $name ?></h1>
    <?php endif; ?>
    <form action="./validation.php" method="POST">
        <?php if(isset($_SESSION["logged-in"])): ?>
            <input type="submit" name="logout" value="log out">
        <?php else: ?>
            LOGIN<br>
            Name :<input type="text" name="name" value=<?php echo $name; ?>><br>
            <span class="invalid"><?php echo $errName; ?></span>
            Password :<input type="text" name="pass"><br>
            <span class="invalid"><?php echo $errPass; ?></span>
            <input type="submit" name="login">
        <?php endif; ?>
    </form>
</body>

</html>
