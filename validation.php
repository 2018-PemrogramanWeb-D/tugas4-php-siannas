<?php
        session_start();
        
        $errName = $errPass = "";
        $name = $pass = "";
        $wrong="";
        $waktu = "";
        
        if(isset($_SESSION["logged-in"])){
            $jam = localtime('2', true);
            
            if($jam >= 4 && $jam<10){
                $waktu = "pagi";  
            }else if($jam >= 10 && $jam<3){
                $waktu = "siang";  
            }else if($jam >= 3 && $jam<6){
                $waktu = "sore";  
            }else{
                $waktu = "malam";
            }
        }

        if(isset($_SESSION["errPass"])){
            $errPass = $_SESSION["errPass"];
        }
        
        if(isset($_SESSION["errName"])){
            $errName = $_SESSION["errName"];
        }

        if(isset($_SESSION["name"])){
            $name = $_SESSION["name"];
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
            if(isset($_POST["login"])){
                
                if(empty($_POST["name"])){
                    $_SESSION["errName"] = "maaf siapa kamu";
                    $name = test_input($_POST["name"]);
                    $wrong = "true";
                }else{
                    $name = test_input($_POST["name"]);
                    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                        $_SESSION["errName"] = "hanya huruf saja";
                        $wrong = "true";
                    }else{
                        $_SESSION["name"] = $name;
                    }
                }
                
                if(empty($_POST["pass"])){
                    $_SESSION["errPass"] = "isi passwordmu";
                    $wrong = "true";
                }else{
                    $pass = test_input($_POST["pass"]);
                    if(strlen($pass)<8){
                        $_SESSION["errPass"] = "password minimal 8 karakter";
                        $wrong = "true";
                    }
                }
                
                if($wrong == "" ){
                    $_SESSION["logged-in"] = "success";
                    unset($_SESSION["errPass"]);
                    unset($_SESSION["errName"]);
                }
                
            }
            if(isset($_POST["logout"])){
                unset($_SESSION["logged-in"]);
                unset($_SESSION["name"]);
            }
            header("location: ./index.php");
        }
            
        

        function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
        }
?>