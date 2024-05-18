<?php
 session_start();

//check if user is already logged in
if(isset($_SESSION['username'])){
    header("location:welcome2.php");
    exit;

}
require_once"config.php";




    if(isset($_POST["login"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $err="";

        if(empty($username)||empty($password)){
            $err="*Username & password cannot be empty";
        }

        if(empty($err)){
            $sql="SELECT user_id,username,password FROM users WHERE username=?";
            $stmt=mysqli_prepare($link,$sql);
            mysqli_stmt_bind_param($stmt,"s",$param_username);
            $param_username=$username;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1){
                    mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password,$hashed_password)){

                            session_start();
                            $_SESSION["username"]=$username;
                            $_SESSION["id"]=$id;
                            $_SESSION["loggedin"]=true;
                            

                           header("location:welcome2.php");
                        }
                    }
                }
            }
        }
    }



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: navy;
            background-size: cover;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .m_container {
            text-align: center;
            padding: 20px;
            border-radius: 5px;
            box-shadow: none; /* No box shadow */
        }
        .m_top {
            margin-bottom: 20px;
        }
        .m_input_box {
            margin-bottom: 10px;
            background-color: transparent; 
        }
        .m_input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            box-sizing: border-box;
        }
        .m_input::placeholder {
            color: white; /* Placeholder text color */
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .m_two a {
            color: white;
        }
        .m_two a:hover {
            text-decoration: underline;
        }
        /* Responsive adjustments */
        @media (max-width: 600px) {
            .m_container {
                width: 90%;
            }
        }
        .reg a{
            color: aliceblue;
        }
    </style>
</head>
<body>
    <div class="m_container">
        <div class="m_top">
            <h2>Have An Account?</h2>
            <h1>Login Now!!</h1>
        </div>
        <form action="" method="post">
            <div class="m_input_box username">
                <input type="text" class="m_input" name="username" placeholder="Username">
                <span class="error" style="color: red;">
                    <?php
                        if(isset($username_err)){
                            echo $username_err;
                            echo <<<css
                             <style>
                                .username{
                                    border:1px solid red;
                                }
                             </style>
                            css;
                        }
                    ?>
                </span>
            </div>
            <div class="m_input_box">
                <input type="password" class="m_input" name="password" placeholder="Password">
            </div>
            <div class="m_input_box">
                <a href="welcome2.php" class="m_input" name="log in">Log in</a> 
            </div>
        </form>
        
        <div>
        <div class="m_two">
            <a href="#" rel="noreferrer">Forgot Password</a>
        </div>
        <p class="reg">Don't have an account? <a href="./registerrr.php">Register here</a></p>
    </div>
</body>
</html>