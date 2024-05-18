<?php
// Include config file
require_once "config.php";
 

    if(isset($_POST["submit"])){
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $email=$_POST["email"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $confirm_password=$_POST["confirm_password"];
        $errors=array();
        $firstname_err=$lastname_err=$email_err=$username_err=$password_err=$confirm_password_err="";
        if(empty($firstname)){
            $firstname_err="<br>*First name is required";
            array_push($errors,"e");
        }
        else//if(!empty($firstname))
        {
            if(!preg_match("/^[a-zA-Z]*$/",$firstname)){
                $firstname_err="<br>*Only alphabets are allowed";
                array_push($errors,"e");
            }

            // else{
            //     $sql="SELECT "
            // }
        }
        if(empty($lastname)){
            $lastname_err="<br>*Last name is required";
            array_push($errors,"e");
        }
        else{
            if(!preg_match("/^[a-zA-Z]*$/",$lastname)){
                $lastname_err="<br>*Only alphabets are allowed";
                array_push($errors,"e");
            }
        }
        if(empty($email)){
            $email_err="*Email is required";
            array_push($errors,"e");
        }
        if(empty($username)){
            $username_err="*Username is required";
            array_push($errors,"e");
        }
        
        if(empty($password)){
            $password_err="*Password is required";
            array_push($errors,"e");
        }
        else{
            if(strlen($password<8)){
                $password_err="*Atleast 8 characters";
                array_push($errors,"e");
            }
            elseif(!preg_match("#[0-9]+#",$password)){
                $password_err="*should contain atleast 1 digit";
                array_push($errors,"e");
            }
            elseif(!preg_match('/[^\w\s]/', $password)){
                $password_err="should contain atleast one special character";
                array_push($errors,"e");
            }

        }
        if(empty($confirm_password)){
            $confirm_password_err="*cannot be empty";
            array_push($errors,"e");
        }
        if($confirm_password!=$password){
            $confirm_password_err="*should be same as password";
            array_push($errors,"e");
        }
        

        if(count($errors)==0){
            require_once "config.php";
            $sql="INSERT INTO users (first_name,last_name,  email,username,password) VALUES(?,?,?,?,?)";
            $stmt=mysqli_stmt_init($link);
            $preparestmt=mysqli_stmt_prepare($stmt,$sql);
            if($preparestmt){
                mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$email,$username,$param_password);
                $param_password=password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Registered Successfully</div>";
                header("location:welcome2.php");
        }
       
            else{
                die("Something went wrong");
            }
        }
        // if(count($errors)==0){
        //     require_once "config.php";
        //     $sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)";
        //     $stmt = mysqli_stmt_init($conn);
        //     $preparestmt = mysqli_stmt_prepare($stmt, $sql);
        //     if($preparestmt){
        //         if(!empty($passwordHash)) { // Check if password is not empty
        //             mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $username, $passwordHash);
        //             mysqli_stmt_execute($stmt);
        //             echo "<div class='alert alert-success'>Registered Successfully</div>";
        //         } else {
        //             echo "<div class='alert alert-danger'>Password cannot be empty</div>";
        //         }
        //     } else {
        //         die("Something went wrong");
        //     }
        // }
        
    }
    

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            /* background: url('img1.jpg') no-repeat center center fixed; */
            background-color: navy;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .m_container {
            text-align: center;
            background-color: transparent; /* Transparent background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: none; /* No box shadow */
        }
        .m_title {
            font-size: 30px;
            margin-bottom: 20px;
        }
        .m_content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .m_input_box {
            margin-bottom: 10px;
            background-color: rgba(255, 255, 255, 0.1); /* Transparent background */
            border-radius: 10px;
            padding: 10px;
            width: 400px;
        }
        .m_input {
            width: 100%;
            padding: 8px;
            border: none;
            background-color: transparent;
            color: white;
            box-sizing: border-box;
        }
        .m_input::placeholder {
            color: white; /* Placeholder text color */
        }
        .m_button {
            margin-top: 20px;
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
    
    </style>
</head>
<body>
<div class="m_container">
        <div class="m_title">REGISTER NOW</div>
        <div class="m_content">
            <form action="registerrr.php"  method="post">
                <div class="m_input_box firstname">
                    <input type="text" name="firstname" class="m_input" placeholder="First Name">
                    <span style="color:red;" class="error"><?php if(isset($firstname_err)){
                        echo $firstname_err;
                        echo <<<css
                        <style>
                            .firstname{
                                border:1px solid red;
                            }
                        </style>
                        
                        css;
                    }  ?></span>
                </div>
                <div class="m_input_box lastname">
                    <input type="text" name="lastname" class="m_input" placeholder="Last Name">
                    <span style="color:red;" class="error">
                        <?php
                        if(isset($lastname_err)){
                            echo $lastname_err;
                            echo <<<css
                            <style>
                                .lastname{
                                    border:1px solid red;
                                }
                            </style>
                            
                            css;
                        }
                        ?>
                    </span>
                </div>
                <div class="m_input_box email">
                    <input type="email" name="email" class="m_input " placeholder="Email">
                    <span style="color:red;" class="error">
                        <?php
                        if(isset($email_err)){
                            echo $email_err;
                            echo <<<css
                            <style>
                                .email{
                                    border:1px solid red;
                                }
                            </style>
                            
                            css;
                        }

                        ?>
                    </span>
                </div>
                <div class="m_input_box username">
                    <input type="text" name="username" class="m_input" placeholder="Username">
                    <span style="color:red;" class="error">
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
                <div class="m_input_box password">
                    <input type="password" name="password" class="m_input" placeholder="Password">
                    <span style="color:red;" class="error">
                        <?php
                        if(isset($password_err)){
                            echo $password_err;
                            echo <<<css
                            <style>
                                .password{
                                    border:1px solid red;
                                }
                            </style>
                            
                            css;
                        }

                        ?>
                    </span>
                </div>
                <div class="m_input_box c_password">
                    <input type="password" name="confirm_password" class="m_input" placeholder="Confirm Password">
                    <span style="color:red;" class="error">
                        <?php
                        if(isset($confirm_password_err)){
                            echo $confirm_password_err;
                            echo <<<css
                            <style>
                                .c_password{
                                    border:1px solid red;
                                }
                            </style>
                            
                            css;
                        }

                        ?>
                    </span>
                </div>
                <div class="m_button">
                <a href="welcome2.php" class="btn btn-primary mb-2">Register</a> 
       
    </script>
                </div>

            </form>
        </div>
    </div>

</body>
</html>



<?php
    session_start();

    //check if user is already logged in
    if(isset($_SESSION['username'])){
        header("location:welcome2.php");
        exit;
    }
    require_once"config.php";

    if(isset($_POST["submit"])){
        // Your existing registration logic here...

        if(count($errors)==0){
            // Your existing code...
            echo "<div class='alert alert-success'>Registered Successfully</div>";
            header("location:welcome2.php"); // Redirect to loginnn.php after successful registration
        }
    }
?>



