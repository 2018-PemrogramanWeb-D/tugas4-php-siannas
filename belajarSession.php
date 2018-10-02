<html>
	<body>
		Selamat Siang 
		<?php 
			session_start();
			if(!isset($_SESSION["user"])){
				$user = $_POST["name"]; 
			}else{
				
			}
			
			echo $user;
			echo "<br>";
			$_SESSION["user"] = $user;
		?>
	</body>
</html>


if(isset($_POST["log-in"])){            
                if(empty($_POST["name"])){
                    $errName = "isi nama user anda";
                    $name = test_input($_POST["name"]);
                }else{
                    $name = test_input($_POST["name"]);
                    if(preg_match("/^[a-zA-Z ]*$/",$name)){
                        $errName = "hanya huruf saja";
                    }
                }

                if(empty($_POST["pass"])){
                    $errPass = "isikan sandi anda";
                }else{
                    $pass = test_input($_POST["pass"]);
                    if(strlen($pass) < 8){
                        $errName = "password minimal 8 karakter";
                    }
                }

                if(empty($errName) && empty($errPass)){
                    $_SESSION["logged-in"] = "success";
                    
                }
                
                header("location: ./index.php");
            }
            
            if(isset($_POST["log-out"])){
                
                unset($_SESSION["logged-in"]);
                header("location: ./index.php");
            }